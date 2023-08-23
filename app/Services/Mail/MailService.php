<?php

namespace App\Services\Mail;

use App\Mail\MailBase;
use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class MailService implements MailServiceInterface
{
    /**
     * Init mail.
     *
     * @param array $params
     * @return MailBase
     */
    public function init($params): MailBase
    {
        try {
            return new MailBase($params);
        } catch (Throwable $th) {
            Log::error('Mail init: ' . $th->getMessage());
            throw $th;
        }
    }

    /**
     * Send mail.
     *
     * @param Mailable $mailInit
     * @param string $mailer
     * @param bool $isQueue
     * @param int|null $queueLater
     * @return ?Mailer
     * @throws Throwable
     */
    public function send(
        Mailable $mailInit,
        string $mailer = 'smtp',
        bool $isQueue = false,
        int $queueLater = null
    ): ?Mailer {
        try {
            $mail = Mail::mailer($mailer);
            if ($isQueue) {
                $mail->queue($mailInit);
            } elseif ($isQueue && $queueLater) {
                $mail->later(now()->addMinutes($queueLater), $mailInit);
            } else {
                $mail->send($mailInit);
            }

            return $mail;
        } catch (\Throwable $th) {
            Log::error('Mail send: ' . $th->getMessage());
            return null;
        }
    }
}
