<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Widget\CampaignResource;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Responsable;

final class CampaignController extends Controller
{
    public function show(Campaign $campaign): Responsable
    {
        return new CampaignResource($campaign);
    }

    public function showLatest(): Responsable
    {
        $campaign = Campaign::query()->scopes(['active'])->latest()->firstOrFail();
        return new CampaignResource($campaign);
    }
}
