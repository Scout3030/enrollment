<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    public $remember_token;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($remember_token, $email)
    {
        $this->remember_token = $remember_token;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__('Reset password notification'))
            ->markdown('mails.notification_reset_password');
    }
}
