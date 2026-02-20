<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioLayout extends Model
{
    protected $fillable = [
        'key',
        'name',
        'component',
        'is_active',
        'weight'
    ];

    public function rules()
    {
        return $this->belongsToMany(PortfolioRule::class, 'portfolio_rule_layout')
            ->withPivot(['sort_order'])
            ->withTimestamps();
    }
}
