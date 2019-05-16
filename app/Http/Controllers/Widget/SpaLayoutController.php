<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

final class SpaLayoutController extends Controller
{
    public function show(): Renderable
    {
        return view('widget.pages.app');
    }
}
