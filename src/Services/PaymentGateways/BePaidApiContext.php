<?php declare(strict_types = 1);

namespace Diglabby\Doika\Services\PaymentGateways;

final class BePaidApiContext
{
    /** @var string */
    public $marketId;

    /** @var string */
    public $marketKey;

    /** @var bool */
    public $live;

    public function __construct(array $context)
    {
        $this->marketId = $context['marketId'];
        $this->marketKey = $context['marketKey'];
        $this->live = (bool) $context['live'];
    }
}
