<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioRule extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'mode',
        'fixed_layout_id',
        'is_active',
        'priority',
        'last_served_layout_id',
        'last_served_at',
        'sticky_enabled',
        'sticky_minutes'
    ];

    public function layouts()
    {
        return $this->belongsToMany(PortfolioLayout::class, 'portfolio_rule_layout')
            ->withPivot(['sort_order'])
            ->orderBy('portfolio_rule_layout.sort_order');
    }

    public function fixedLayout()
    {
        return $this->belongsTo(PortfolioLayout::class, 'fixed_layout_id');
    }
}
