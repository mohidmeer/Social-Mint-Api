<?php

namespace App\Models;

use App\Models\Discord\Channels;
use App\Models\Discord\Discord;
use App\Models\Facebook\Facebook;
use App\Models\Facebook\Pages;
use App\Models\Instagram\Instagram;
use App\Models\Instagram\InstagramAccounts;
use App\Models\Pintrest\Board;
use App\Models\Pintrest\Pintrest;
use App\Models\Reditt\Reditt;
use App\Models\Telegram\Telegram;
use App\Models\Twitter\Twitter;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'api_access_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',


    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // protected $appends = [
    //     'profile_photo_url',
    // ];


    public function Limit(){
        return $this->hasOne(RequestLimit::class); 
    }
    public function RequestsMade(){
        return $this->hasOne(ApiRequests::class); 
    }

    
    public function Twitter()
    {
        return $this->hasOne(Twitter::class);
    }

    public function Facebook()
    {
        return $this->hasOne(Facebook::class);
    }
    public function Instagram()
    {
        return $this->hasOne(Instagram::class);
    }

    public function fbpages()
    {
        return $this->hasMany(Pages::class);
    }
    
    public function instaAccounts()
    {
        return $this->hasMany(InstagramAccounts::class);
    }
    public function Reditt()
    {
        return $this->hasOne(Reditt::class);
    }
    public function Telegram()
    {
        return $this->hasOne(Telegram::class);
    }

    public function Discord()
    {
        return $this->hasOne(Discord::class);
    }

    public function DChannels()
    {
        return $this->hasMany(Channels::class);
    }

    public function Pintrest()
    {
        return $this->hasOne(Pintrest::class);
    }

    public function BPintrest()
    {
        return $this->hasMany(Board::class);
    }

   

}
