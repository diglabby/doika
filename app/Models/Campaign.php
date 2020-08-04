<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Diglabby\Doika\Models\Campaign.
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $description
 * @property string                          $picture_url
 * @property int                             $target_amount   Target amount in cents
 * @property string                          $currency
 * @property bool                            $active_status
 * @property \Illuminate\Support\Carbon|null $start_at
 * @property \Illuminate\Support\Carbon|null $finish_at
 * @property array                           $visual_settings Button preset, colors, etc. (as json)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Diglabby\Doika\Models\Subscription[] $subscriptions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Diglabby\Doika\Models\Transaction[] $transactions
 * @property-read \Illuminate\Database\Eloquent\Collection|\Diglabby\Doika\Models\CampaignTranslation[] $translations
 *
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Campaign newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Campaign newQuery()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Campaign onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Campaign query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Campaign withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\Diglabby\Doika\Models\Campaign withoutTrashed()
 * @mixin \Eloquent
 */
class Campaign extends Model
{
    use SoftDeletes;

    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array The attributes that should be mutated to dates */
    protected $dates = [
        'start_at',
        'finish_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** @var array The attributes that should be cast to native types */
    protected $casts = [
        'active_status'   => 'bool',
        'visual_settings' => 'array',
    ];

    /** @var array Default attribute values */
    protected $attributes = [
        'description'   => '',
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
        return now() > $this->finish_at;
    }
}
