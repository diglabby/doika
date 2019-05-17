<?php declare(strict_types = 1);

namespace Diglabby\Doika\Mail;

use Illuminate\Mail\Mailable;

final class RecurringPaymentFailed extends Mailable
{
    /** @inheritDoc */
    public function build(): self
    {
        return $this->view('emails.recurringPayments.recurringPaymentFailed', [
            'message' => 'We are going to change your card',
        ]);
    }
}
