<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

final class CampaignResource extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        /** @var \Diglabby\Doika\Models\Campaign $campaign */
        $campaign = $this->resource;

        return array_merge(
            $campaign->attributesToArray(),
            [
                'amount_collected' => $campaign->transactions->sum('amount'),
                'translations'     => $this->whenLoaded('translations'),
            ]
        );
    }
}
