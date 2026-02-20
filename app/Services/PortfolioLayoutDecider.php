<?php

namespace App\Services;

use App\Models\PortfolioRule;
use Illuminate\Support\Facades\Cookie;

class PortfolioLayoutDecider
{

    public function decide(): array
    {
        $now = now()->setTimezone(config('app.timezone'))->format('H:i:s');

        $rule = PortfolioRule::query()
            ->where('is_active', true)
            ->orderBy('priority')
            ->get()
            ->first(fn($r) => $this->timeMatches($now, $r->start_time, $r->end_time));

        if (!$rule) {
            return ['component' => 'Portfolio/Cartoon', 'rule' => null, 'layoutKey' => null];
        }

        $cookieName = "portfolio_layout_rule_{$rule->id}";
        if ($rule->sticky_enabled) {
            $stickyKey = request()->cookie($cookieName);
            if ($stickyKey) {
                $layout = $rule->layouts()->where('key', $stickyKey)->where('is_active', true)->first();
                if ($layout) {
                    return ['component' => $layout->component, 'rule' => $rule->id, 'layoutKey' => $layout->key];
                }
            }
        }

        $layout = match ($rule->mode) {
            'fixed' => $rule->fixedLayout,
            'random' => $this->pickRandom($rule),
            'weighted_random' => $this->pickWeighted($rule),
            'round_robin' => $this->pickRoundRobin($rule),
            default => $this->pickRandom($rule),
        };

        if (!$layout) {
            return ['component' => 'Portfolio/Cartoon', 'rule' => $rule->id, 'layoutKey' => null];
        }

        if ($rule->sticky_enabled) {
            Cookie::queue($cookieName, $layout->key, $rule->sticky_minutes);
        }

        return ['component' => $layout->component, 'rule' => $rule->id, 'layoutKey' => $layout->key];
    }

    private function timeMatches(string $now, string $start, string $end): bool
    {
        if ($start <= $end) {
            return $now >= $start && $now <= $end;
        }
        return $now >= $start || $now <= $end;
    }

    private function pickRandom($rule)
    {
        return $rule->layouts()->where('is_active', true)->inRandomOrder()->first();
    }

    private function pickWeighted($rule)
    {
        $layouts = $rule->layouts()->where('is_active', true)->get();
        if ($layouts->isEmpty()) return null;

        $bag = [];
        foreach ($layouts as $l) {
            $w = max(1, (int)$l->weight);
            $w = min($w, 50);
            for ($i=0; $i<$w; $i++) $bag[] = $l;
        }

        return $bag[array_rand($bag)];
    }

    private function pickRoundRobin($rule)
    {
        $layouts = $rule->layouts()->where('is_active', true)->get();
        if ($layouts->isEmpty()) return null;

        $currentId = $rule->last_served_layout_id;

        $next = $layouts->first();
        if ($currentId) {
            $idx = $layouts->search(fn($l) => $l->id === $currentId);
            if ($idx !== false) {
                $next = $layouts[($idx + 1) % $layouts->count()];
            }
        }

        $rule->forceFill([
            'last_served_layout_id' => $next->id,
            'last_served_at' => now(),
        ])->save();

        return $next;
    }
}