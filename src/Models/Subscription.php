<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $deleted_at
 *
 * Relationships:
 * @property-read Donator $donator
 * @property-read Campaign $campaign
 */
final class Subscription extends Model
{
    use SoftDeletes;

    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array Default attributes */
    protected $attributes = [
        'currency' => 'BYN',
        'payment_interval' => 'P1M', // means "Period: 1 Month"
    ];

    /** @var array Date casting */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
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
