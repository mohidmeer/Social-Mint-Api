<?php

namespace App\Models\Pintrest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pintrest extends Model
{
    use HasFactory;

    protected $fillable= [ 'user_id','avatar','name','refresh_token','access_token'];
}
