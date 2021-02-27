<?php

declare(strict_types=1);

namespace Diglabby\Doika\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int                             $id
 * @property string                          $name
 * @property string                          $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string                          $password
 * @property string|null                     $remember_token
 * @property string                          $locale
 * @property string|null                     $last_access_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Admin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Admin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\Diglabby\Doika\Models\Admin query()
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable;

    /** @var array The attributes that aren't mass assignable */
    protected $guarded = [];

    /** @var array Default attribute values */
    protected $attributes = [
        'locale' => 'ua',
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
