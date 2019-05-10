<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class SpaLayoutController extends Controller
{
    public function show(): Renderable
    {
        return view('dashboard.pages.app');
    }
}
