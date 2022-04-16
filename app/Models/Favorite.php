<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = "favorites";

    protected $fillable = [
        "user_id",
        "script_id",
    ];
    
    public function posts()
    {
        return $this->belongsTo('App\Models\Post', 'script_id', 'id');
    } 
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }  
}