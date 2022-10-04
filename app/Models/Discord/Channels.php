<?php

namespace App\Models\Discord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;

    protected $fillable=[

        'name', 'channel_id','user_id','status'
    ];

}
