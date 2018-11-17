<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $guarded = [];

    public function businessUndergoes()
    {
    	return $this->hasMany(BusinessUndergoes::class);
    }
    
}
