<?php declare(strict_types = 1);

namespace Diglabby\Doika\Models;

use Diglabby\Doika\Services\PaymentGateways\SupportsSubscriptionsGateway;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property int $donator_id
 * @property int $campaign_id
 * @property string $payment_gateway ("bePaid", etc)
 * @property string $payment_gateway_subscription_id
 * @property int $amount
 * @property string $currency
 * @property string $payment_interval (Time interval in ISO 8601, "P1M" by default)
 * @property string $unsubscribe_token
 * @property string|null $cancel_reason
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

    /** @var array Default attribute values */
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

    public static function boot(): void
    {
        parent::boot();

        self::creating(function (Subscription $subscription) {
            $subscription->unsubscribe_token = Str::random();
        });
    }

    public function donator(): BelongsTo
    {
        return $this->belongsTo(Donator::class);
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function paymentGateway(): SupportsSubscriptionsGateway
    {
        return resolve($this->payment_gateway);
    }

    public function cancel(string $reason = "Customer's request"): void
    {
        $this->paymentGateway()->unsubscribe($this, $reason);
        $this->cancel_reason = $reason;
        $this->delete();
    }

    public function isCanceled(): bool
    {
        return $this->trashed();
    }

    public function getCancelationUrl(): string
    {
        return route('widget.subscriptions.delete', ['secret' => $this->unsubscribe_token]);
    }
}
