<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

final class BePaidApiContext
{
    /** @var string */
    public $marketId;

    /** @var string */
    public $marketKey;

    /** @var bool */
    protected $live;

    public function __construct(array $context)
    {
        $this->marketId = $context['marketId'];
        $this->marketKey = $context['marketKey'];
        $this->live = (bool) $context['live'];
    }

    public function isLive(): bool
    {
        return $this->live;
    }

    public function isTest(): bool
    {
        return !$this->isLive();
    }
}
