<?php

namespace Diglabby\Doika;

use Diglabby\Doika\Tables\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $donator_id
 * @property string $payment_gateway ("bePaid", etc)
 * @property string $payment_gateway_subscription_id
 * @property int $amount
 * @property string $currency
 * @property string $payment_interval (Time interval in ISO 8601, "P1M" by default)
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relationships:
 * @property-read Donator $donator
 * @property-read Campaign $campaign
 */
final class Subscription extends Model
{
    /** @var array Default attributes */
    protected $attributes = [
        'currency' => 'BYN',
        'payment_interval' => 'P1M',
    ];

    /** @var array The attributes that should be mutated to dates */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function donator(): BelongsTo
    {
        return $this->belongsTo(Donator::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
