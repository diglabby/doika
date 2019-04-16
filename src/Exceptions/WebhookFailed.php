<?php

namespace Diglabby\Doika\Exceptions;

class WebhookFailed extends \Exception implements DoikaException
{
    public static function missingAuthorization(): self
    {
        return new static('Received webhook request does not contain required authorization data, it can be hacking attempt or bePaid changes their API, please check https://docs.bepaid.by/en/changelog');
    }

    public static function invalidAuthorization(): self
    {
        return new static('Received webhook request contains invalid authorization data, it can be hacking attempt or bePaid changes their API, please check https://docs.bepaid.by/en/changelog');
    }

    public static function invalidMarket(string $marketId): self
    {
        return new static("The bepaid market id is not properly configured or invalid, please check BEPAID_MARKET_ID variable in your .env file. Received Market ID: $marketId");
    }

    public static function invalidMarketKey(string $marketKey): self
    {
        return new static("The bepaid market key is not properly configured or invalid, please check BEPAID_MARKET_KEY variable in your .env file. Received Market Key: $marketKey");
    }
}
