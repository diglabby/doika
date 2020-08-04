<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Diglabby\Doika\Models\Transaction.
 *
 * @property int                             $id
 * @property int                             $donator_id
 * @property int                             $campaign_id
 * @property int|null                        $subscription_id
 * @property string                          $payment_gateway
 * @property string                          $payment_gateway_transaction_id Native transaction ID on Payment Gateway
 * @property int                             $amount                         Amount in cents
 * @property string                          $currency
 * @property string                          $status
 * @property string                          $status_message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Diglabby\Doika\Models\Campaign $campaign
 * @property-read \Diglabby\Doika\Models\Donator $donator
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Transaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Transaction query()
 * @mixin \Eloquent
 */
class Transaction extends Model
{
    protected $guarded = [];

    /** @see https://docs.bepaid.by/ru/gateway/statuses */
    public const STATUS_SUCCESSFUL = 'successful';
    public const STATUS_FAILED = 'failed';
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_EXPIRED = 'expired';

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function donator(): BelongsTo
    {
        return $this->belongsTo(Donator::class);
    }
}
