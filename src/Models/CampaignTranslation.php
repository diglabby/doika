<?php

namespace Diglabby\Doika\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $campaign_id
 * @property string $locale
 * @property string $name
 * @property string $description
 * @property string $terms_of_use
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relationships:
 * @property-read Campaign $campaign
 */
final class CampaignTranslation extends Model
{
    /** @var array Default attributes */
    protected $attributes = [
        'description' => '',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
