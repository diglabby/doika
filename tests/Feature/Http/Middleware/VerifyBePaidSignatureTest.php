<?php

namespace Tests\Feature\Http\Middleware;

use Diglabby\Doika\Exceptions\WebhookFailed;
use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;
use Diglabby\Doika\Services\PaymentGateways\BePaidApiContext;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class VerifyBePaidSignatureTest extends TestCase
{
    private const VALID_MARKET_ID = 1111;
    private const VALID_MARKET_KEY = 'random_valid_key';

    /** @test */
    public function it_allow_requests_with_valid_auth_headers()
    {
        $response = $this->getResponseFromRouteWithMiddleware([
            'PHP_AUTH_USER' => self::VALID_MARKET_ID,
            'PHP_AUTH_PW' => self::VALID_MARKET_KEY,
        ]);

        $response->assertOk();
    }

    /** @test */
    public function it_forbids_requests_without_authorization_header()
    {
        $this->expectException(WebhookFailed::class);

        $response = $this->getResponseFromRouteWithMiddleware([]);

        $response->assertOk();
    }

    /** @test */
    public function it_forbids_requests_with_invalid_marked_id()
    {
        $this->expectException(WebhookFailed::class);

        $response = $this->getResponseFromRouteWithMiddleware([
            'PHP_AUTH_USER' => self::VALID_MARKET_ID + 1,
            'PHP_AUTH_PW' => self::VALID_MARKET_KEY,
        ]);

        $response->assertOk();
    }

    /** @test */
    public function it_forbids_requests_with_invalid_marked_key()
    {
        $this->expectException(WebhookFailed::class);

        $response = $this->getResponseFromRouteWithMiddleware([
            'PHP_AUTH_USER' => self::VALID_MARKET_ID,
            'PHP_AUTH_PW' => 'random_INVALID_key',
        ]);

        $response->assertOk();
    }

    private function getResponseFromRouteWithMiddleware(array $sendRequestWithHeaders): TestResponse
    {
        $this->app->bind(BePaidApiContext::class, function () {
            return new BePaidApiContext([
                'marketId' => self::VALID_MARKET_ID,
                'marketKey' => self::VALID_MARKET_KEY,
                'mode' => 'test',
            ]);
        });

        if (array_key_exists('PHP_AUTH_USER', $sendRequestWithHeaders) && array_key_exists('PHP_AUTH_PW', $sendRequestWithHeaders)) {
            $authorization = $this->generateAuthorizationHeader($sendRequestWithHeaders['PHP_AUTH_USER'], $sendRequestWithHeaders['PHP_AUTH_PW']);
            $sendRequestWithHeaders['HTTP_AUTHORIZATION'] = $authorization;
        }

        $request = Request::create('_fake_webhook_route', 'GET', [], [], [], $sendRequestWithHeaders);
        $middleware = resolve(VerifyBePaidSignature::class);

        return $middleware->handle($request, function () {
            return new TestResponse(new Response());
        });
    }

    /**
     * NOTE! This magic Symfony request do under the scene, but we need to repeat it here bc we bypassing the whole request lifecycle.
     *
     * @see \Symfony\Component\HttpFoundation\ServerBag::getHeaders
     * @see https://evertpot.com/223/ about php-auth-user and php-auth-pw
     */
    private function generateAuthorizationHeader(string $phpAuthUser, string $phpAuthPw): string
    {
        $encodedCredentials = base64_encode($phpAuthUser.':'.$phpAuthPw);

        return "Basic: $encodedCredentials";
    }
}
