<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'facebook',
        'instagram',
        'twitter',
        'reddit',
        'discord',
        'pintrest',
        'telegram',
    ];



}
