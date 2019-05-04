<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        return view('dashboard.pages.home');
    }
}
