<?php declare(strict_types = 1);

namespace Diglabby\Doika\Tables;

use Illuminate\Database\Eloquent\Model;

final class Campaign extends Model
{
    // связь один-ко-многим где модель выступает ведущей
    public function payments(){
        return $this->hasMany('Diglabby\Doika\Tables\Payment');
    }
    public function campaign_lang_informations(){
        return $this->hasMany('Diglabby\Doika\Tables\Campaign_lang_information');
    }
}
