<?php declare(strict_types = 1);

namespace Diglabby\Doika\Http\Controllers\Widget;

use Diglabby\Doika\Http\Controllers\Controller;
use Diglabby\Doika\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class SubscriptionController extends Controller
{
    public function delete(Request $request)
    {
        if (! $request->has('secret')) {
            throw new NotFoundHttpException('Missing unsubscribe secret');
        }

        /** @var Subscription $subscription */
        $subscription = Subscription::query()
            ->where('unsubscribe_token', $request->get('secret'))
            ->firstOrFail();

        $subscription->cancel();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
