<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    public function families()
    {
    	return $this->belongsToMany('Modules\Family\Entities\Family');
    }
}
