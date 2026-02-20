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
        Schema::create('portfolio_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('start_time'); // 06:00:00
            $table->time('end_time');   // 11:59:59
            $table->enum('mode', ['fixed', 'random', 'round_robin', 'weighted_random'])->default('random');

            $table->foreignId('fixed_layout_id')->nullable()->constrained('portfolio_layouts')->nullOnDelete();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('priority')->default(100);

            // for round-robin state
            $table->foreignId('last_served_layout_id')->nullable()->constrained('portfolio_layouts')->nullOnDelete();
            $table->timestamp('last_served_at')->nullable();

            // sticky behavior
            $table->boolean('sticky_enabled')->default(true);
            $table->unsignedInteger('sticky_minutes')->default(1440); // 24h
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_rules');
    }
};
