<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Diglabby\Doika\Services\PaymentGateways\SupportsSubscriptionsGateway;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * Diglabby\Doika\Models\Subscription.
 *
 * @property int                             $id
 * @property int                             $donator_id
 * @property int                             $campaign_id
 * @property string                          $payment_gateway
 * @property string                          $payment_gateway_subscription_id Native subscription ID on PG
 * @property int                             $amount                          Amount in cents
 * @property string                          $currency
 * @property string                          $payment_interval                An ISO 8601 repeating interval specification
 * @property string                          $unsubscribe_token
 * @property string|null                     $cancel_reason                   A reason of subscription cancellation
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Diglabby\Doika\Models\Campaign $campaign
 * @property-read \Diglabby\Doika\Models\Donator $donator
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Subscription newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Subscription onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Subscription query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Subscription withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Subscription withoutTrashed()
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    use SoftDeletes;

    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array Default attribute values */
    protected $attributes = [
        'currency'         => 'BYN',
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
