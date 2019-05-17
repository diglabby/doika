<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $picture_url
 * @property int $target_amount
 * @property string $currency
 * @property bool $active_status
 * @property Carbon $started_at
 * @property Carbon $finished_at
 * @property string $visual_settings (json)
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * Relationships
 * @property Collection|Donator[] $donators
 * @property Collection|Subscription[] $subscriptions
 * @property Collection|Transaction[] $transactions
 * @property Collection|CampaignTranslation[] $translations
 */
final class Campaign extends Model
{
    use SoftDeletes;

    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array The attributes that should be mutated to dates */
    protected $dates = [
        'started_at',
        'finished_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** @var array The attributes that should be cast to native types */
    protected $casts = [
        'active_status' => 'bool',
        'visual_settings' => 'array',
    ];

    /** @var array Default attribute values */
    protected $attributes = [
        'description' => '',
        'active_status' => false,
    ];

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(CampaignTranslation::class);
    }

    public function isFinished(): bool
    {
        return now() > $this->finished_at;
    }
}
