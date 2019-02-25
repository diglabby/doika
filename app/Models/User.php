<?php

namespace App\Models;

use Illuminate\Support\Facades\Gate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword as ResetPasswordNotification;

/**
 * @property int                                                                                                       $id
 * @property string                                                                                                    $first_name
 * @property string                                                                                                    $last_name
 * @property string                                                                                                    $email
 * @property \Carbon\Carbon|null                                                                                       $email_verified_at
 * @property string|null                                                                                               $password
 * @property bool                                                                                                      $active
 * @property string|null                                                                                               $remember_token
 * @property string                                                                                                    $locale
 * @property string                                                                                                    $timezone
 * @property string                                                                                                    $slug
 * @property \Carbon\Carbon|null                                                                                       $last_access_at
 * @property \Carbon\Carbon|null                                                                                       $created_at
 * @property \Carbon\Carbon|null                                                                                       $updated_at
 * @property mixed                                                                                                     $avatar
 * @property mixed                                                                                                     $can_delete
 * @property mixed                                                                                                     $can_edit
 * @property mixed                                                                                                     $is_super_admin
 * @property \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\SocialLogin[]                                        $providers
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User actives()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'last_access_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'active',
        'locale',
        'timezone',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'avatar',
        'can_edit',
        'can_delete',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function (self $model) {
            $model->slug = str_slug($model->name);
        });
    }

    public function getCanEditAttribute()
    {
        return ! $this->is_super_admin || 1 === auth()->id();
    }

    public function getCanDeleteAttribute()
    {
        return ! $this->is_super_admin && $this->id !== auth()->id() && (
            Gate::check('delete users')
        );
    }

    public function getCanImpersonateAttribute()
    {
        if (Gate::check('impersonate users')) {
            return ! $this->is_super_admin
                && session()->get('admin_user_id') !== $this->id
                && $this->id !== auth()->id();
        }

        return false;
    }

    public function scopeActives(Builder $query)
    {
        return $query->where('active', '=', true);
    }

    public function getIsSuperAdminAttribute()
    {
        return 1 === $this->id;
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * @param $provider
     *
     * @return bool
     */
    public function getProvider($provider)
    {
        return $this->providers->first(function (SocialLogin $item) use ($provider) {
            return $item->provider === $provider;
        });
    }

    /**
     * @return mixed
     */
    public function providers()
    {
        return $this->hasMany(SocialLogin::class);
    }

    /**
     * Get user avatar from gravatar.
     */
    public function getAvatarAttribute()
    {
        $hash = md5($this->email);

        return "https://secure.gravatar.com/avatar/{$hash}?size=100&d=mm&r=g";
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /** @deprecated Created for backward compatibility with old code that we are going to remove */
    public function isAdmin(): bool
    {
        return true;
    }

    public function getNameAttribute(): string
    {
        return "$this->first_name $this->last_name";
    }
}
