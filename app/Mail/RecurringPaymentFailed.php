<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RecurringPaymentFailed extends Mailable
{
    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recurringPayments.recurringPaymentFailed',[
            'message' => 'We are going to change your card',
        ]);
    }
}
