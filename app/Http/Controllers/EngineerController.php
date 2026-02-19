<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class EngineerController extends Controller
{
    public function index()
    {
        Inertia::setRootView('layouts/engineer');
        return Inertia::render('Engineer/Index');
    }
}