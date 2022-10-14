<?php

namespace App\Models\Instagram;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id','name','avatar','access_token'
    ];
}
