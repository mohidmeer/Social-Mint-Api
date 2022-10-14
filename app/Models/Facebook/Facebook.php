<?php

namespace App\Models\Facebook;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facebook extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id','name','avatar','access_token'
    ];
}
