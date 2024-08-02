<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Coach extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $guarded = ['soso'];
    protected $hidden = ['password'];

    public function posts(): MorphMany
    {
        return $this->morphMany(Post::class, 'postable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function plans(): HasMany
    {
        return $this->hasMany(coachPlan::class);
    }

    public function ratings(): MorphMany
    {
        return $this->morphMany(Rating::class, 'rateable');
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'subscriptions')->withPivot('status');
    }
}
