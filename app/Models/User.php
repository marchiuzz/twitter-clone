<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
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
        'email_verified_at' => 'datetime',
    ];

    public function getAvatarAttribute($value)
    {
        return asset('storage/'.$value);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
        $follows = $this->follows()->pluck('id');

        $tweets = Tweet::whereIn('user_id', $follows)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->simplePaginate(5);


        return $tweets;
    }

    public function path($append = ''){
        $path = route('profile', $this);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

}
