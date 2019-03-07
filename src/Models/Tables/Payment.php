<?php declare(strict_types = 1);

namespace Diglabby\Doika\Tables;

use Illuminate\Database\Eloquent\Model;

final class Payment extends Model
{
    //связи модели один-ко-многим в которых она является дочерней
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
