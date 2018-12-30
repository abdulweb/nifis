<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function families()
    {
    	return $this->hasMany('Modules\Family\Entities\Family');
    }

    public function lgas()
    {
    	return $this->belongsToMany(Lga::class);
    }
}
