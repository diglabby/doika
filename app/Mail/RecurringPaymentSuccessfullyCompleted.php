<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class RecurringPaymentSuccessfullyCompleted extends Mailable
{
    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.recurringPayments.recurringPaymentSuccessfullyCompleted', [
            'message' => '🚀',
        ]);
    }
}
