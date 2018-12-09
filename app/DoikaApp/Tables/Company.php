<?php

namespace App\DoikaApp\Tables;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //связи один-ко-многим, где модель является главной
    public function campaign_configurations(){
        return $this->hasMany('App\DoikaApp\Tables\Company_configuration');
    }
    public function campaign_lang_informations(){
        return $this->hasMany('App\DoikaApp\Tables\Company_lang_information');
    }
    public function payments(){
        return $this->hasMany('App\DoikaApp\Tables\Payment');
    }
}
