<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

final class TransactionResource extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        /** @var \Diglabby\Doika\Models\Transaction $transaction */
        $transaction = $this->resource;

        return [
            'id' => $transaction->id,
            'campaign' => $transaction->campaign->name,
            'donator' => $transaction->donator->name,
            'status_message' => $transaction->status_message,
            'amount' => $transaction->amount,
            'currency' => $transaction->currency,
            'created_at' => $transaction->created_at->timestamp,
        ];
    }
}
