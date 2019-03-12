<?php declare(strict_types = 1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;

final class CampaignLangInformation extends Model
{
    //связи модели один-ко-многим в которых она является дочерней
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
