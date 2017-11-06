<?php

namespace App\Mail;

use App\MarketingEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * VerifyEmail constructor.
     * @param MarketingEmail $marketing_email
     */
    public function __construct(MarketingEmail $marketing_email)
    {
        $this->marketing_email = $marketing_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
            ->view('emails.verify-email')
            ->with([
                'email' => $this->marketing_email->email,
                'hash' => urlencode($this->marketing_email->hash),
            ]);
    }
}
