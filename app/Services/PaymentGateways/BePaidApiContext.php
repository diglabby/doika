<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

final class BePaidApiContext
{
    /** @var string */
    public $marketId;

    /** @var string */
    public $marketKey;

    /** @var string */
    protected $mode;

    public function __construct(array $context)
    {
        $this->marketId = $context['marketId'];
        $this->marketKey = $context['marketKey'];
        $this->mode = $context['mode'];
    }

    public function isLive(): bool
    {
        return $this->mode === 'live';
    }

    public function isTest(): bool
    {
        return !$this->isLive();
    }
}
