<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    protected $guarded = [];

    public function state()
    {
        return $this->belongTo(State::class);
    }

    public function town()
    {
        return $this->hasMany(Town::class);
    }

    public function locations()
    {
    	return $this->hasMany(Location::class);
    }
}
