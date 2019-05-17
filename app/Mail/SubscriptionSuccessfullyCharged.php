<?php declare(strict_types=1);

namespace Diglabby\Doika\Mail;

use Diglabby\Doika\Models\Subscription;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Mail\Mailable;

final class SubscriptionSuccessfullyCharged extends Mailable
{
    /** @var Subscription */
    public $subscription;
    /** @var Transaction */
    private $transaction;

    public function __construct(Subscription $subscription, Transaction $transaction)
    {
        $this->subscription = $subscription;
        $this->transaction = $transaction;
    }

    /** @inheritDoc */
    public function build(): self
    {
        return $this
            ->subject('Дзякуй за чарговае ахвяраванне!')
            ->markdown('emails.subscriptions.charge--success', [
                'subscription' => $this->subscription,
                'transaction' => $this->transaction,
                'campaign' => $this->subscription->campaign,
            ]);
    }
}
