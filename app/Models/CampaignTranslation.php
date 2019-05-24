<?php declare(strict_types = 1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

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
    /** @var array Default attribute values */
    protected $attributes = [
        'description' => '',
    ];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
