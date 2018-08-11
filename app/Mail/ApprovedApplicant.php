<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApprovedApplicant extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $job;

    public function __construct($name, $job)
    {
        $this->name = $name;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pattonsecu@gmail.com', 'Patton Security & Investigation Agency')
                    ->subject('Application Approval')
                    ->markdown('emails.approved_applicant');
    }
}
