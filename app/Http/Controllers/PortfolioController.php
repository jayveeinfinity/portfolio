<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Services\PortfolioLayoutDecider;

class PortfolioController extends Controller
{
    public function __construct(
        protected EngineerController $engineerController,
        protected TechCEOController $techCeoController
    ) {
        Inertia::setRootView('layouts/cartoon');
    }

    public function index(PortfolioLayoutDecider $decider)
    {
        $result = $decider->decide();

        return Inertia::render($result['component'], [
            'ruleId' => $result['rule'],
            'layoutKey' => $result['layoutKey'],
        ]);
    }
}
