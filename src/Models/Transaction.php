<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

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
    /** @see https://docs.bepaid.by/ru/gateway/statuses */
    private const STATUS_SUCCESSFULL = 'successful';
    private const STATUS_FAILED = 'failed';
    private const STATUS_INCOMPLETE = 'incomplete';
    private const STATUS_EXPIRED = 'expired';
}
