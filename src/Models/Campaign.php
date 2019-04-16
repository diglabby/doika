<?php

namespace Diglabby\Doika\Models;

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
 * @property Carbon $started_at
 * @property Carbon $finished_at
 * @property bool $active_status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $deleted_at
 *
 * Relationships
 * @property Donator[] $donators
 * @property Transaction[] $translations
 */
final class Campaign extends Model
{
    use SoftDeletes;

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
    ];

    /** @var array Default attribute values */
    protected $attributes = [
        'active_status' => false,
    ];

    public function donators(): HasMany
    {
        return $this->hasMany(Donator::class);
    }

    public function translations(): HasMany
    {
        return $this->hasMany(CampaignTranslation::class);
    }
}
