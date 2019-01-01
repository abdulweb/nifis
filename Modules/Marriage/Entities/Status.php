<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class WifeStatus extends Model
{

    protected $guarded = [];

    public function wife()
    {
    	return $this->hasMany(Wife::class);
    }
    
}
