<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Jsonable;

final class CampaignController extends Controller
{
    public function show(Campaign $campaign): Jsonable
    {
        return $campaign;
    }
}
