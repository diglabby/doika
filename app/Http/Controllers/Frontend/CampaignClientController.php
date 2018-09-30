<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CampaignPageClient;

class CampaignClientController extends Controller
{
    //
    public function getCampaignClient($id)
    {
        return response()->json(CampaignPageClient::getCampaignClientArray($id));
    }
}
