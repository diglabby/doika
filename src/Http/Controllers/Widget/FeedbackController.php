<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

final class FeedbackController extends Controller
{
    public function show(): Renderable
    {
        return view('widget.pages.feedbacks.show');
    }

    public function store(Request $request)
    {
        // @todo what is supposed to return here?
        return $request->all();
    }
}
