<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sender;
    public $email;
    public $subject;
    public $message;

    public function __construct($sender, $senderEmail, $senderSubject, $senderMessage)
    {
        $this->sender = $sender;
        $this->email = $senderEmail;
        $this->subject = $senderSubject;
        $this->message = $senderMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                ->subject($this->subject)
                ->markdown('emails.contactus');
    }
}
