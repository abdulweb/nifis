<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use Notifiable, Billable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts() {
      return $this->hasMany('App\SocialAccount');
    }
    public function posts() {
      return $this->hasMany('App\Post');
    }

    public function death()
    {
        return $this->hasMany('Modules\Death\Entities\Death');
    }

    public function comments()
    {
      return $this->hasMany('App\Comment');
    }
    public function profile()
    {
      return $this->hasOne('Modules\Profile\Entities\Profile');
    }
    public function family()
    {
      return $this->hasOne('Modules\Family\Entities\Family');
    }
}
