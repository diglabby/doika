<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function campaign(){
        return $this->belongsTo('App\Model\Campaign');
    }
}
