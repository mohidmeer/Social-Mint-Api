<?php

namespace App\Models\Facebook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'page_access_token',
        'name',
        'page_id'
    ];
}
