<?php

namespace App\Models\Discord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discord extends Model
{
    use HasFactory;


    protected $fillable=[

        'name','avatar','access_token','refresh_token','user_id'
    ]
}
