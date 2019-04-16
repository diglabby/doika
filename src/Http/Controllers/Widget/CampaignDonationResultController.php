<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use Illuminate\Http\Request;
use Diglabby\Doika\Models\Campaign;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

final class CampaignDonationResultController extends Controller
{
    public function show(Campaign $campaign, Request $request): Renderable
    {
        return view('widget.pages.campaigns.donation-result', [
            'campaign' => $campaign,
            'status' => $request->get('status'),
        ]);
    }
}
