<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Diglabby\Doika\Models\Donator.
 *
 * @property int                             $id
 * @property string                          $email
 * @property string|null                     $name
 * @property int|null                        $phone      Phone using international format (without leading "+" sign)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string                          $locale
 * @property-read \Illuminate\Database\Eloquent\Collection|\Diglabby\Doika\Models\Subscription[] $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Diglabby\Doika\Models\Transaction[] $transactions
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Donator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Donator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Donator query()
 * @mixin \Eloquent
 */
class Donator extends Model implements HasLocalePreference
{
    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array Default attribute values */
    protected $attributes = [
        'locale' => 'ua',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /** {@inheritdoc} */
    public function preferredLocale()
    {
        return $this->locale;
    }
}
