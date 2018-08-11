<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Interview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $interviewDate;
    public $interviewTime;
    public $title;
    public $message;

    public function __construct($interviewDate, $interviewTime, $title, $message)
    {
        $this->interviewDate = $interviewDate;
        $this->interviewTime = $interviewTime;
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency')
                    ->subject('Job Interview')
                    ->markdown('emails.interview');
    }
}
