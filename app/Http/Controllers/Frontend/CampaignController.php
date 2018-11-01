<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Repositories\Contracts\PostRepository;

class CampaignController extends FrontendController
{
    /**
     * @var PostRepository
     */
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @param \App\Repositories\Contracts\PostRepository $posts
     */
    public function __construct(PostRepository $posts)
    {
        parent::__construct();

        $this->posts = $posts;
    }

    public function index()
    {
        return view('frontend.campaign.index')->withPosts(
            $this->posts->published()->paginate(9)
        );
    }

    public function tag(Tag $tag)
    {
        $this->setTranslatable($tag);

        return view('frontend.campaign.tag')->withTag($tag)->withPosts(
            $this->posts->publishedByTag($tag)->paginate(9)
        );
    }

    public function owner(User $user)
    {
        $this->setLocalesAttributes(['user' => $user->slug]);

        return view('frontend.campaign.owner')
            ->withUser($user)
            ->withPosts($this->posts->publishedByOwner($user)->paginate(9));
    }

    public function show(Post $campaignId)
    {
        // If not published, only user with edit access can see it
        //if (! $post->published && ! Gate::check('update', $post)) {
        //    abort(404);
        //}



        //$this->setTranslatable($post);
        $data = '{
                  	"layout": "form",
                  	"styles": {

                  	},
                  	"content": {
                  		"title": "First campaign title",
                  		"description": "First campaign description, soooo loooong shhhittt",
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

    public function donate(Post $campaignId)
    {
        // If not published, only user with edit access can see it
        //if (! $post->published && ! Gate::check('update', $post)) {
        //    abort(404);
        //}



        //$this->setTranslatable($post);
        $data = '{
                  	"layout": "form",
                  	"styles": {

                  	},
                  	"content": {
                  		"title": "First campaign title",
                  		"description": "First campaign description, soooo loooong shhhittt",
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
        //if (! $post->published && ! Gate::check('update', $post)) {
        //    abort(404);
        //}



        //$this->setTranslatable($post);
        $data = '{
          "layout": "form",
          "styles": {

          },
          "content" : {
            "title" : "First campaign title",
            "description" : "First campaign description, soooo loooong shhhittt",
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
