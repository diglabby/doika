<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Campaign;
use App\Models\User;
//use App\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
//use App\Repositories\Contracts\PostRepository;

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
    //public function __construct(CampaignRepository $campaigns)
    public function __construct()
    {
        parent::__construct();

        //$this->campaigns = $campaigns;
        $this->campaigns = null;
    }

    public function index()
    {
        //return view('frontend.campaign.index')->withCampaigns(
        //    $this->campaigns->published()->paginate(9)
        //);
        return null;
    }

    public function tag(Tag $tag)
    {
        //$this->setTranslatable($tag);

        //return view('frontend.campaign.tag')->withTag($tag)->withCampaigns(
        //    $this->campaigns->publishedByTag($tag)->paginate(9)
        //);
        return null;
    }

    public function owner(User $user)
    {
        //$this->setLocalesAttributes(['user' => $user->slug]);

        //return view('frontend.campaign.owner')
        //    ->withUser($user)
        //    ->withCampaigns($this->campaigns->publishedByOwner($user)->paginate(9));
        return null;
    }

    public function show()
    {
        // If not published, only user with edit access can see it
        //if (! $campaign->published && ! Gate::check('update', $campaign)) {
        //    abort(404);
        //}



        //$this->setTranslatable($campaign);
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

                  		"button_values": [
                  			"2",
                  			"4",
                  			"6",
                  			"8",
                  			"10",
                  			"12"
                  		],

                  		"termsOfUse": {}
                  	}
                  }';

        return view('client.campaign')->withData($data);
    }

    public function donate()
    {
        // If not published, only user with edit access can see it
        //if (! $campaign->published && ! Gate::check('update', $campaign)) {
        //    abort(404);
        //}



        //$this->setTranslatable($campaign);
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

                  		"button_values": [
                  			"2",
                  			"4",
                  			"6",
                  			"8",
                  			"10",
                  			"12"
                  		],

                  		"termsOfUse": {}
                  	}
                  }';

        return view('client.campaign')->withData($data);
    }

    public function get()
    {
        // If not published, only user with edit access can see it
        //if (! $campaign->published && ! Gate::check('update', $campaign)) {
        //    abort(404);
        //}



        //$this->setTranslatable($campaign);
        $data = '{
          "layout": "form",
          "styles": {

          },
          "content" : {
            "title" : "First campaign title",
            "description" : "First campaign description",
            "image" : "placeholder.png",

            "warnings" : {
              "cost_error" : "invalid cost"
            },

            "button_values" : [ "2", "4", "6", "8", "10", "12"],

            "currency" : "BYN",

            "termsOfUse" : {
            }
          },
          "funded" : {
            "current": 10,
            "goal": 100
          }
        }';

        //return Response::json($data);
        return Response::make($data, 200, ['Content-Type' => 'text/plain']);
    }
}
