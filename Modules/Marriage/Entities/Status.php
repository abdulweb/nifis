<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $guarded = [];

    public function wife()
    {
    	return $this->hasMany(Wife::class);
    }
    
}
