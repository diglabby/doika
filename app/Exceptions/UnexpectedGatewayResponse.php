<?php

namespace Diglabby\Doika\Exceptions;

final class UnexpectedGatewayResponse extends \RuntimeException implements DoikaException
{
    public static function withBody(string $body, ?\Throwable $throwable = null): self
    {
        return new self("Unexpected Payment Gateway response: {$body}", null, $throwable);
    }
}
