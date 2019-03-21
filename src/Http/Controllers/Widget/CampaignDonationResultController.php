<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Renderable;

final class CampaignDonationResultController extends Controller
{
    public function show(Campaign $campaign, string $status): Renderable
    {
        return view('widget.pages.campaigns.donation-result', [
            'campaign' => $campaign,
            'status' => $status,
        ]);
    }
}
