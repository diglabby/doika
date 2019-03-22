<?php

namespace Tests\Feature\Http\Middleware;

use Diglabby\Doika\Exceptions\WebhookFailed;
use Diglabby\Doika\Http\Middleware\VerifyBePaidSignature;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tests\TestCase;

class VerifyBePaidSignatureTest extends TestCase
{
    /** @test */
    function it_allow_requests_with_valid_auth_headers()
    {
        config()->set('services.bepaid.marketId', 2222);
        config()->set('services.bepaid.marketKey', 'random_valid_key');

        $response = $this->getResponseFromRouteWithMiddleware(['PHP_AUTH_USER' => 2222, 'PHP_AUTH_PW' => 'random_valid_key']);

        $response->assertOk();
    }

    /** @test */
    function it_forbids_requests_without_authorization_header()
    {
        $this->expectException(WebhookFailed::class);
        $response = $this->getResponseFromRouteWithMiddleware([]);

        $response->assertOk();
    }

    /** @test */
    function it_forbids_requests_with_invalid_marked_id()
    {
        config()->set('services.bepaid.marketId', 2222);
        config()->set('services.bepaid.marketKey', 'random_valid_key');

        $this->expectException(WebhookFailed::class);
        $response = $this->getResponseFromRouteWithMiddleware(['PHP_AUTH_USER' => 2223, 'PHP_AUTH_PW' => 'random_valid_key']);

        $response->assertOk();
    }

    /** @test */
    function it_forbids_requests_with_invalid_marked_key()
    {
        config()->set('services.bepaid.marketId', 2222);
        config()->set('services.bepaid.marketKey', 'random_valid_key');

        $this->expectException(WebhookFailed::class);
        $response = $this->getResponseFromRouteWithMiddleware(['PHP_AUTH_USER' => 2222, 'PHP_AUTH_PW' => 'random_INVALID_key']);

        $response->assertOk();
    }

    private function getResponseFromRouteWithMiddleware(array $headers): TestResponse
    {
        if (array_key_exists('PHP_AUTH_USER', $headers) && array_key_exists('PHP_AUTH_PW', $headers)) {
            $authorization = $this->generateAuthorizationHeader($headers['PHP_AUTH_USER'], $headers['PHP_AUTH_PW']);
            $headers['HTTP_AUTHORIZATION'] = $authorization;
        }

        $request = Request::create('_fake_webhook_route', 'GET', [], [], [], $headers);
        $middleware = new VerifyBePaidSignature();

        return $middleware->handle($request, function () {
            return new TestResponse(new Response());
        });
    }

    /**
     * NOTE! This magic Symfony request do under the scene, but we need to repeat it here bc we bypassing the whole request lifecycle
     * @see \Symfony\Component\HttpFoundation\ServerBag::getHeaders
     * @see https://evertpot.com/223/ about php-auth-user and php-auth-pw
     */
    private function generateAuthorizationHeader(string $phpAuthUser, string $phpAuthPw): string
    {
        $encodedCredentials = base64_encode($phpAuthUser.':'.$phpAuthPw);
        return "Basic: $encodedCredentials";
    }

}
