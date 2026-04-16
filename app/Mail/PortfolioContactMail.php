<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PortfolioContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $alias,
        public string $email,
        public string $mission
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "Portfolio Inquiry from {$this->alias}",
            replyTo: [$this->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.portfolio_contact',
            with: [
                'alias' => $this->alias,
                'email' => $this->email,
                'mission' => $this->mission,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
