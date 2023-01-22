<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable=[

        'user_id','host',  'response' ,'route' , 'meathod', 'user_agent','duration'
        
        
    ];
}
