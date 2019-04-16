<?php

namespace Diglabby\Doika\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $donator_id
 * @property int $campaign_id
 * @property int $subscription_id
 * @property string $payment_gateway ("bePaid", etc)
 * @property string $payment_gateway_transaction_id
 * @property int $amount
 * @property string $currency
 * @property string $status
 * @property string $status_message
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class Transaction extends Model
{
    protected $guarded = [];

    /** @see https://docs.bepaid.by/ru/gateway/statuses */
    public const STATUS_SUCCESSFUL = 'successful';
    public const STATUS_FAILED = 'failed';
    public const STATUS_INCOMPLETE = 'incomplete';
    public const STATUS_EXPIRED = 'expired';
}
