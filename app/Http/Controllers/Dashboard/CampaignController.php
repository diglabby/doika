<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\CampaignResource;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

final class CampaignController extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Campaign::query()
            ->with('transactions') // to calc sum of transactions
            ->withCount(['subscriptions', 'transactions']);

        return CampaignResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Campaign $campaign)
    {
        return new CampaignResource($campaign);
    }

    public function store(Request $request)
    {
        $campaign = new Campaign($request->all());
        $campaign->save();

        return $campaign;
    }

    public function update(Campaign $campaign, Request $request)
    {
        $campaign->update($request->all());
        return $campaign;
    }

    public function delete(Campaign $campaign)
    {
        $campaign->delete();
        return $campaign;
    }
}
