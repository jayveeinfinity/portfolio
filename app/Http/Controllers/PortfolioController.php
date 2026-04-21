<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Mail\PortfolioContactMail;
use Illuminate\Support\Facades\Mail;
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

    public function contact(Request $request)
    {
        // Honeypot field - If a bot fills this out, silently accept but do nothing
        if ($request->filled('company_website')) {
            // Fake a success delay briefly to trick bots
            sleep(1);
            return back()->with('success', 'Message sent successfully!');
        }

        $validated = $request->validate([
            'alias' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mission' => 'required|string|max:5000',
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new PortfolioContactMail(
                alias: $validated['alias'],
                email: $validated['email'],
                mission: $validated['mission']
            ));

        return back()->with('success', 'Signal received! I will reply as soon as possible.');
    }
}
