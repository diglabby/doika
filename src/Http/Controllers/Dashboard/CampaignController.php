<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Http\Request;

final class CampaignController extends Controller
{
    public function index()
    {
        return factory(Campaign::class, 10)->make();
    }

    public function show(int $campaignId)
    {
        return factory(Campaign::class)->make();
    }

    public function delete(Campaign $campaign)
    {
        return $campaign->delete();
    }
}
