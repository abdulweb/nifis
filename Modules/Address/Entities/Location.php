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

    public function lga()
    {
    	return $this->belongsTo(Lga::class);
    }
}
