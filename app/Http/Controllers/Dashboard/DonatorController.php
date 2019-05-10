<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Donator;
use Illuminate\Http\Request;
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

    public function store(Request $request)
    {
        return response()->json([], Response::HTTP_ACCEPTED);
    }

    public function update(int $donatorId)
    {
        return response()->json([], Response::HTTP_ACCEPTED);
    }

    public function delete(int $donatorId)
    {
        return response()->json([], Response::HTTP_ACCEPTED);
    }
}
