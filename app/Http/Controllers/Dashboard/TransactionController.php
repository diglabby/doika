<?php

declare(strict_types=1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\TransactionResource;
use Diglabby\Doika\Models\Transaction;
use Spatie\QueryBuilder\QueryBuilder;

final class TransactionController extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Transaction::query();

        return TransactionResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Transaction $transaction): \JsonSerializable
    {
        return new TransactionResource($transaction);
    }
}
