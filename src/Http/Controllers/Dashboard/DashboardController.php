<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        return view('dashboard.pages.home');
    }
}
