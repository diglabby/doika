<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\DonatorResource;
use Diglabby\Doika\Models\Donator;
use Spatie\QueryBuilder\QueryBuilder;

final class DonatorController extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Donator::query();

        return DonatorResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Donator $donator): \JsonSerializable
    {
        return new DonatorResource($donator);
    }
}
