<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $donator_id
 * @property int $campaign_id
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
        'payment_interval' => 'P1M', // means "Period: 1 Month"
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
