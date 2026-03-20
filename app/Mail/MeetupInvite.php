<?php

namespace App\Mail;

use App\Models\MeetupRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MeetupInvite extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public MeetupRequest $meetup) {}

    public function envelope(): Envelope
    {
        $inviterName = $this->meetup->user->name;
        return new Envelope(
            subject: "{$inviterName} wants to meet you for a coffee ☕",
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.meetup-invite',
        );
    }
}
