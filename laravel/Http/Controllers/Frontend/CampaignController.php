<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;


class CampaignController extends FrontendController
{
    /**
     * @var CampaignRepository
     */
    protected $campaigns;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\Contracts\CampaignRepository $campaigns
     */

    public function __construct()
    {
        parent::__construct();
        $this->campaigns = null;
    }

    public function index()
    {
        return null;
    }

    public function show()
    {
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

    public function donate()
    {
        $data = '{
          "layout": "form",
          "styles": {
          },
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

    public function donateRecurrent()
    {
      return null;
    }

    public function createDonator()
    {
      return null;
    }
}
