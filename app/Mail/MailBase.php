<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;
use Illuminate\Queue\SerializesModels;

class MailBase extends Mailable
{
    use Queueable, SerializesModels;

    /** @var array */
    public array $params;

    /**
     * Create a new message instance.
     *
     * @param $params
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $from = new Address(config('mail.from.address'), config('mail.from.name'));
        if (!empty($this->params['from'])) {
            $from = is_array($this->params['from'])
                ? new Address($this->params['from'][0], $this->params['from'][1])
                : new Address($this->params['from']);
        }

        $this->params['reply_to'] = $this->params['reply_to'] ?? null;
        if ($this->params['reply_to']) {
            $replyTo = [
                is_array($this->params['reply_to'])
                    ? new Address($this->params['reply_to'][0], $this->params['reply_to'][1])
                    : new Address($this->params['reply_to'])
            ];
        }

        return new Envelope(
            from: $from,
            to: $this->params['to'],
            cc: $this->params['cc'] ?? null,
            bcc: $this->params['bcc'] ?? null,
            replyTo: $replyTo ?? null,
            subject: $this->params['subject']
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: $this->params['html_content'] ?? null,
            text: $this->params['text_content'] ?? null
        );
    }

    /**
     * Get the message headers.
     */
    public function headers(): Headers
    {
        return new Headers(
            text: $this->params['header'] ?? []
        );
    }
}
