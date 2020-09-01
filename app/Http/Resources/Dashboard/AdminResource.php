<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

final class AdminResource extends JsonResource
{
    /** {@inheritdoc} */
    public function toArray($request): array
    {
        /** @var \Diglabby\Doika\Models\Admin $admin */
        $admin = $this->resource;

        return [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'created_at' => $admin->created_at->timestamp,
            'updated_at' => $admin->updated_at->timestamp,
        ];
    }
}
