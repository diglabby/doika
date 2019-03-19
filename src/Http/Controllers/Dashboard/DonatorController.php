<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Donator;
use Illuminate\Http\Response;

final class DonatorController extends Controller
{
    public function index()
    {
        return factory(Donator::class, 10)->make();
    }

    public function show(int $donatorId)
    {
        return factory(Donator::class)->make();
    }

    public function delete(int $donatorId)
    {
        return response()->json([], Response::HTTP_ACCEPTED);
    }
}
