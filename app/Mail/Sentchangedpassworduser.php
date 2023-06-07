<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sentchangedpassworduser extends Mailable
{
    use Queueable, SerializesModels;
    public $send_confirmpassword;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($send_confirmpassword)
    {
        $this->send_confirmpassword = $send_confirmpassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from ItSolutionStuff.com')
                            ->view('OTP-mailer.changed-password-userSetting');
    }
}
