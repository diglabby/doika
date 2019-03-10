<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $email
 * @property string|null $name
 * @property int|null $phone
 *
 * Relationships:
 * @property-read Collection|Subscription[] $subscriptions
 * @property-read Collection|Transaction[] $transactions
 */
final class Donator extends Model
{
    public function subscriptions(): HasMany
    {
        $this->hasMany(Subscription::class);
    }

    public function transactions(): HasMany
    {
        $this->hasMany(Transaction::class);
    }
}
