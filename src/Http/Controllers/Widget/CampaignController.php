<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Renderable;

final class CampaignController extends Controller
{
    public function show(int $campaignId): Renderable
    {
        /** @var Campaign $campaign */
        $campaign = factory(Campaign::class)->make(['id' => $campaignId]);

        return view('widget.pages.campaigns.show', ['campaign' => $campaign]);
    }
}
