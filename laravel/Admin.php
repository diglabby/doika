<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

final class Admin extends Authenticatable
{
    use Notifiable;

    /** @var array Default attributes */
    protected $attributes = [
        'locale' => 'be',
        'timezone' => 'Europe/Minsk',
    ];

    /** @var array The attributes that are mass assignable */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** @var array The attributes that should be hidden for arrays */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /** @var array The attributes that should be cast to native types */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
