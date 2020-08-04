<?php

declare(strict_types=1);

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
        /** @var Subscription $subscription */
        $subscription = Subscription::query()
            ->where('unsubscribe_token', $request->get('secret'))
            ->first();

        if ($subscription === null) {
            throw new NotFoundHttpException('Missing or invalid unsubscribe secret');
        }

        $subscription->cancel();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
