<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{

    protected $guarded = [];

    public function profiles()
    {
    	return $this->belongsToMany(Profile::class);
    }
}
