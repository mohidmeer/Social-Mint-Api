<?php

namespace App\Models\Pintrest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable=['board_id','name','user_id' ,'status'];
}
