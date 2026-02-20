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
        Schema::create('portfolio_layouts', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();                 // e.g. layout_modern_ceo
            $table->string('name');                          // e.g. Modern CEO
            $table->string('component');                     // Inertia component, e.g. "Portfolio/Layouts/ModernCEO"
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('weight')->default(1);   // for weighted random
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_layouts');
    }
};
