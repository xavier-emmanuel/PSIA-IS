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
    public $frm_status;

    public function __construct($interviewDate, $interviewTime, $title, $message, $frm_status)
    {
        $this->interviewDate = $interviewDate;
        $this->interviewTime = $interviewTime;
        $this->title = $title;
        $this->message = $message;
        $this->frm_status = $frm_status;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        if ($this->frm_status == 'Resched') {
            return $this->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency')
                    ->subject('Reschedule of Job Interview')
                    ->markdown('emails.interview');
        } else {
            return $this->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency')
                    ->subject('Job Interview')
                    ->markdown('emails.interview');
        }
    }
}
