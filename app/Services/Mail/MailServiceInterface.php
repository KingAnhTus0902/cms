<?php

namespace App\Services\Mail;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Mailable;

interface MailServiceInterface
{
    /**
     * Init mail.
     *
     * @param array $params
     * @return Mailable|null
     */
    public function init($params): Mailable|null;

    /**
     * Send mail.
     *
     * @param Mailable $mailInit
     * @param string $mailer
     * @param bool $isQueue
     * @param int|null $queueLater
     * @return ?Mailer
     */
    public function send(
        Mailable $mailInit,
        string $mailer = 'smtp',
        bool $isQueue = false,
        int $queueLater = null
    ): ?Mailer;
}
