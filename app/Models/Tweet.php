<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likesAmount()
    {
        return $this->likes()->where('like_or_dislike', '=', 0)->count();
    }

    public function dislikesAmount()
    {
        return $this->likes()->where('like_or_dislike', '=', 0)->count();
    }

    public function like($liked = true)
    {
        return $this->likes()->updateOrCreate(
            [
                //todo: pakeisti
                'user_id' => 7, //auth()->id
            ],
            [
                'like_or_dislike' => $liked,
            ]
        );
    }

    public function dislike()
    {
        return $this->like(false);
    }

    public function likes()
    {
        return $this->hasMany(Like::class)->where('like_or_dislike', true);
    }

    public function dislikes()
    {
        return $this->hasMany(Like::class)->where('like_or_dislike', false);
    }

    public function isLikedBy(User $user){
        return $this->likes->where('user_id', $user->id)->exists();
    }

    public function isDislikedBy(User $user){
        return $this->dislikes->where('user_id', $user->id)->exists();
    }

}
