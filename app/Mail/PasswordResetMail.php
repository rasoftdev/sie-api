<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;

    public function __construct($token,)
    {
        $this->token = $token;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(env('MAIL_FROM_ADDRESS', 'no-reply@ricardoalvarez.com.co'), env('MAIL_FROM_NAME', 'SIE APP')),
            subject: 'Restablecer contraseña'
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.reset_password_mail',
            with: [
                'token' => $this->token,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
