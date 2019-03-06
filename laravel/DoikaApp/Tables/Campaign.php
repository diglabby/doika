<?php

namespace App\DoikaApp\Tables;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    // связь один-ко-многим где модель выступает ведущей
    public function payments(){
        return $this->hasMany('App\DoikaApp\Tables\Payment');
    }
    public function campaign_lang_informations(){
        return $this->hasMany('App\DoikaApp\Tables\Campaign_lang_information');
    }
}
