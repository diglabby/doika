<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

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
