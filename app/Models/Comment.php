<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "comments";

    protected $fillable = [
        'question_id',
        'commented_user_id',
        'comment_to_user_id',
        'comment',
        'rating',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'commented_user_id', 'id');
    }

}
