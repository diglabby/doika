<?php declare(strict_types = 1);

namespace Diglabby\Doika\Mail;

use Illuminate\Mail\Mailable;

final class RecurringPaymentSuccessfullyCompleted extends Mailable
{
    /** @inheritDoc */
    public function build(): self
    {
        return $this->view('emails.recurringPayments.recurringPaymentSuccessfullyCompleted', [
            'message' => '🚀',
        ]);
    }
}
