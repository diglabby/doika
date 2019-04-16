<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $locale
 * @property string $timezone
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $last_access_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 */
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
