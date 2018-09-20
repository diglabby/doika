<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //связи модели один-ко-многим в которых она является дочерней
    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }
}
