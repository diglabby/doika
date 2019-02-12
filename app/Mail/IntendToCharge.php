<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class IntendToCharge extends Mailable
{
    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recurringPayments.intendToCharge',[
            'message' => 'We are going to change your card',
        ]);
    }
}
