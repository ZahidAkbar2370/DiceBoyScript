<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Rating extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

       protected $fillable = [
        'script_id',
        'script_user_id',
        'rating_user_id',
        'rating',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'script_user_id', 'id');
    }

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'script_id', 'id');
    }

}
