<?php declare(strict_types = 1);

namespace Diglabby\Doika\Tables;

use Illuminate\Database\Eloquent\Model;

final class Campaign extends Model
{
    // связь один-ко-многим где модель выступает ведущей
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function campaign_lang_informations()
    {
        return $this->hasMany(CampaignLangInformation::class);
    }
}
