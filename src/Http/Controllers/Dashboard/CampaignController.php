<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;

final class CampaignController extends Controller
{
    public function index()
    {
        return view('backend.admin.list', ['campaigns' => factory(Campaign::class, 10)->make()]);
    }

    public function show(int $campaignId)
    {
        return view('backend.admin.campaign', [
            'campaign' => factory(Campaign::class)->make(['id' => $campaignId])
        ]);
    }

    public function delete(Campaign $campaign)
    {
        return $campaign->delete();
    }
}
