<?php

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    /** @var array Default vattribute values */
    protected $attributes = [
        'active_status' => false,
    ];

    public function campaign_lang_informations()
    {
        return $this->hasMany(CampaignLangInformation::class);
    }
}
