<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Dashboard;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Http\Resources\Dashboard\SubscriptionResource;
use Diglabby\Doika\Models\Subscription;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

final class SubscriptionController extends Controller
{
    public function index(): \JsonSerializable
    {
        $query = Subscription::query()
            ->with(['donator', 'campaign']);

        return SubscriptionResource::collection(
            QueryBuilder::for($query)->paginate()
        );
    }

    public function show(Subscription $subscription): \JsonSerializable
    {
        return new SubscriptionResource($subscription);
    }

    public function delete(Subscription $subscription)
    {
        $subscription->cancel();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
