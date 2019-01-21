<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $guarded = [];

    public function wives()
    {
    	return $this->hasMany(Wife::class);
    }
    
}
