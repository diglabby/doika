<?php declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Campaign;
use Illuminate\Contracts\Support\Renderable;

final class CampaignController extends Controller
{
    public function show(int $compaignId): Renderable
    {
        /** @var Campaign $compaign */
//        $compaign = factory(Campaign::class)->make();
//        return $compaign;

        $data = '{
          "layout": "form",
          "styles": { },
          "content": {
            "title": "First campaign title",
            "description": "First campaign description",
            "image": "path_url",
            "warnings": {
              "cost_error": "invalid cost"
            },
            "button_values": [ "2", "4", "6", "8", "10", "12" ],
            "termsOfUse": {}
            }
        }';
        return view('client.campaign')->withData($data);
    }
}
