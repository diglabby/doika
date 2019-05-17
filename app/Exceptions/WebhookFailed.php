<?php

namespace Diglabby\Doika\Exceptions;

class WebhookFailed extends \Exception implements DoikaException
{
    public static function missingAuthorization(): WebhookFailed
    {
        return new static('Received webhook request does not contain required authorization data, it can be hacking attempt or bePaid changes their API, please check https://docs.bepaid.by/en/changelog');
    }

    public static function invalidAuthorization(): WebhookFailed
    {
        return new static('Received webhook request contains invalid authorization data, it can be hacking attempt or bePaid changes their API, please check https://docs.bepaid.by/en/changelog');
    }

    public static function invalidMarket(string $marketId): WebhookFailed
    {
        return new static("The bepaid market id is not properly configured or invalid, please check bePaid settings. Received Market ID: $marketId");
    }

    public static function invalidMarketKey(string $marketKey): WebhookFailed
    {
        return new static("The bepaid market key is not properly configured or invalid, please check bePaid settings. Received Market Key: $marketKey");
    }
}
