<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title', 'body'];
}
