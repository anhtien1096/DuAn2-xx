<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'fullname', 'birthday', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return makeTimeAgo($value);
    }

    public function Socials()
    {
        return $this->hasMany(Socials::class);
    }

    public function socialProviders()
    {
        return $this->hasMany(Socials::class);
    }

    public function Posts()
    {
        return $this->hasMany(Posts::class, 'user_created');
    }
}
