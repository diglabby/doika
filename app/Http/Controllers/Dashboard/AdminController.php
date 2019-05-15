<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\AdminResource;
use Diglabby\Doika\Models\Admin;
use Diglabby\Doika\Models\Transaction;
use Spatie\QueryBuilder\QueryBuilder;

final class AdminController  extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Admin::query();

        return AdminResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Transaction $transaction): \JsonSerializable
    {
        return new AdminResource($transaction);
    }
}
