<?php

namespace Diglabby\Doika\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

final class SubscriptionResource extends JsonResource
{
    /** @inheritDoc */
    public function toArray($request): array
    {
        /** @var \Diglabby\Doika\Models\Subscription $subscription */
        $subscription = $this->resource;
        $subscription->load(['donator', 'campaign']);

        return [
            'id' => $subscription->id,
            'donator' => [
                'id' => $subscription->donator->id,
                'name' => $subscription->donator->name,
            ],
            'campaign' => [
                'id' => $subscription->campaign->id,
                'name' => $subscription->campaign->name,
            ],
            'payment_gateway' => $subscription->payment_gateway,
            'amount' => $subscription->amount,
            'currency' => $subscription->currency,
            'created_at' => $subscription->created_at->timestamp,
        ];
    }
}
