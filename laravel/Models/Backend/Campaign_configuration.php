<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Campaign_configuration extends Model
{   
    public function campaign(){
        return $this->belongsTo('App\Model\Campaign');
    }
}
