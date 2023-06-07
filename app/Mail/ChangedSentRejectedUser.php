<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangedSentRejectedUser extends Mailable
{
    use Queueable, SerializesModels;
    public $approved_status_againEmail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($approved_status_againEmail)
    {
        $this->approved_status_againEmail = $approved_status_againEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from ItSolutionStuff.com')
                            ->view('OTP-mailer.changedApproved-status');
    }
}
