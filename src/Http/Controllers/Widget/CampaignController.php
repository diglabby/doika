<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Widget\CampaignResource;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Responsable;

final class CampaignController extends Controller
{
    public function show(Campaign $campaign): Responsable
    {
        return new CampaignResource($campaign);
    }
}
