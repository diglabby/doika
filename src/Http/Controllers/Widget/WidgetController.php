<?php

namespace Diglabby\Doika\Http\Controllers\Widget;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class WidgetController extends Controller
{
    public function index(): Renderable
    {
        return view('widget.pages.home');
    }
}