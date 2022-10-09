<?php

namespace App\Models\Instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstagramAccounts extends Model
{


    use HasFactory;

    protected $fillable = [
        'user_id',
        'insta_business_id',
        'page_id',
        'page_access_token',
        'name',
        'profile_picture_url',
        'status'

    ];

    
}
