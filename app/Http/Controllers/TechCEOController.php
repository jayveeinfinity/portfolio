<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class TechCEOController extends Controller
{
    public function index()
    {
        Inertia::setRootView('layouts/tech-ceo');
        return Inertia::render('TechCEO/Index');
    }
}
