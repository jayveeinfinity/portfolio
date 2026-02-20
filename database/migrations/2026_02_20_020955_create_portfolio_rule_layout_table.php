<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolio_rule_layout', function (Blueprint $table) {
            $table->id();
            $table->foreignId('portfolio_rule_id')
                ->constrained('portfolio_rules')
                ->cascadeOnDelete();
            $table->foreignId('portfolio_layout_id')
                ->constrained('portfolio_layouts')
                ->cascadeOnDelete();
            $table->unsignedInteger('sort_order')->default(0);
            $table->unique(
                ['portfolio_rule_id', 'portfolio_layout_id'],
                'prl_rule_layout_unique'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_rule_layout');
    }
};
