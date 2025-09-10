<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ShootScheduledMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public object $shoot;
    public string $paymentLink;

    public function __construct(User $user, object $shoot, string $paymentLink)
    {
        $this->user = $user;
        $this->shoot = $shoot;
        $this->paymentLink = $paymentLink;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Shoot Scheduled for ' . $this->shoot->location,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.shoot_scheduled',
            with: [
                'user' => $this->user,
                'shoot' => $this->shoot,
                'paymentLink' => $this->paymentLink,
            ]
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
