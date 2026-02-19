<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function __construct(
        protected EngineerController $engineerController
    ) {}

    public function index()
    {
        return $this->engineerController->index();
    }
}
