<?php

declare(strict_types=1);

namespace Diglabby\Doika\Mail;

use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Mail\Mailable;

final class SubscriptionChargeFailed extends Mailable
{
    /** @var Subscription|null */
    public $subscription;
    /** @var Transaction */
    private $transaction;

    public function __construct(?Subscription $subscription, Transaction $transaction)
    {
        $this->subscription = $subscription;
        $this->transaction = $transaction;
    }

    /** {@inheritdoc} */
    public function build(): self
    {
        return $this
            ->subject('Памылка пры стварэнні падпіскі')
            ->markdown('emails.subscriptions.charge--failed', [
                'subscription' => $this->subscription,
                'transaction'  => $this->transaction,
                'campaign'     => $this->transaction->campaign,
            ]);
    }
}
