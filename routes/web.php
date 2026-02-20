<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

Route::get('/', [PortfolioController::class, 'index']);

// Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
//     Route::resource('portfolio-layouts', AdminPortfolioLayoutController::class);
//     Route::resource('portfolio-rules', AdminPortfolioRuleController::class);

//     Route::post('portfolio-rules/{rule}/layouts/sync', [AdminPortfolioRuleController::class, 'syncLayouts'])
//         ->name('portfolio-rules.layouts.sync');
// });