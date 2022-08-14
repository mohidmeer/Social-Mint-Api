<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaAccessTokens extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fb_access_token'
        
    ];



    
}
