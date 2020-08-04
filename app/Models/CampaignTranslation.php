<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Diglabby\Doika\Models\CampaignTranslation.
 *
 * @property int                             $id
 * @property int                             $campaign_id
 * @property string                          $locale
 * @property string                          $name
 * @property string                          $description
 * @property string                          $terms_of_use HTML text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Diglabby\Doika\Models\Campaign $campaign
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\CampaignTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\CampaignTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\CampaignTranslation query()
 * @mixin \Eloquent
 */
class CampaignTranslation extends Model
{
    /** @var array Default attribute values */
    protected $attributes = [
        'description' => '',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
