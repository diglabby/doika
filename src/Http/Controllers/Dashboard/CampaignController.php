<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

final class CampaignController extends Controller
{
    public function index(): Paginator
    {
        return QueryBuilder::for(Campaign::class)
            ->allowedIncludes('donators')
            ->simplePaginate();
    }

    public function show(Campaign $campaign)
    {
        return $campaign;
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
        return $campaign->delete();
    }
}
