<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->hasMany(Profile::class);
    }
}
