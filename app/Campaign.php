<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //связи один-ко-многим, где модель является главной
    public function campaign_configurations(){
        return $this->hasMany('App\Campaign_configuration');
    }
    public function campaign_lang_informations(){
        return $this->hasMany('App\Campaign_lang_information');
    }
    public function payments(){
        return $this->hasMany('App\Payment');
    }
    
}
