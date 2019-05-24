<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Webhooks\PaymentGateways\BePaidEventHandlers;

use Diglabby\Doika\Models\Transaction;
use Illuminate\Http\Request;

final class CreateFailedTransaction
{
    public function handle(Request $request): void
    {
        $transaction = new Transaction([
            'amount' => $request->json('plan.plan.amount'),
            'currency' => $request->json('plan.currency'),
            'campaign_id' => $request->json('additional_data.campaign_id'),
            'donator_id' => $request->json('additional_data.donator_id'),
            'payment_gateway' => 'bePaid',
            'payment_gateway_transaction_id' => $request->json('last_transaction.uid'),
            'status' => Transaction::STATUS_FAILED,
            'status_message' => $request->json('last_transaction.message'),
        ]);
        $transaction->save();
    }
}
