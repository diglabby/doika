<?php

namespace Diglabby\Doika\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $email
 * @property string|null $name
 * @property int|null $phone
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relationships:
 * @property-read Collection|Subscription[] $subscriptions
 * @property-read Collection|Transaction[] $transactions
 */
final class Donator extends Model
{
    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
