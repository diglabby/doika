<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Http\Request;

final class CampaignController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.campaigns.index', ['campaigns' => factory(Campaign::class, 10)->make()]);
    }

    public function show(int $campaignId)
    {
        return view('dashboard.pages.campaigns.show', [
            'campaign' => factory(Campaign::class)->make(['id' => $campaignId])
        ]);
    }

    public function store(Request $request)
    {
        $campaign = new Campaign($request->all());
        $campaign->save();

        return $campaign;
    }

    public function update(int $campaignId, Request $request)
    {
        return Campaign::query()->findOrFail($campaignId);
    }

    public function delete(Campaign $campaign)
    {
        return $campaign->delete();
    }
}
