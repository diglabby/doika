<?php declare(strict_types = 1);

namespace Diglabby\Doika\Models;

use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $email
 * @property string|null $name
 * @property int|null $phone
 * @property string $locale
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relationships:
 * @property-read Collection|Subscription[] $subscriptions
 * @property-read Collection|Transaction[] $transactions
 */
final class Donator extends Model implements HasLocalePreference
{
    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array Default attribute values */
    protected $attributes = [
        'locale' => 'be',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /** @inheritDoc */
    public function preferredLocale()
    {
        return $this->locale;
    }
}
