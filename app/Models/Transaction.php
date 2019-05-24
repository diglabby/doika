<?php declare(strict_types = 1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
 *
 * @property-read Campaign $campaign
 * @property-read Donator $donator
 */
final class Transaction extends Model
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
