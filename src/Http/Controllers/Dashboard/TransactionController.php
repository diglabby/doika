<?php

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Diglabby\Doika\Models\Transaction;
use Illuminate\Http\Request;

final class TransactionController extends Controller
{
    public function index()
    {
        return factory(Transaction::class, 10)->make();
    }

    public function show(int $transactionId)
    {
        return factory(Transaction::class)->make();
    }

    public function store(Request $request)
    {
        $transaction = new Transaction($request->all());
        $transaction->save();

        return $transaction;
    }
}

