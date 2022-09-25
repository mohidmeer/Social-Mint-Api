<?php

namespace App\Models\Reditt;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reditt extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'name',
        'access_token',
        'refresh_token',
        'avatar_url',
    ];
}
