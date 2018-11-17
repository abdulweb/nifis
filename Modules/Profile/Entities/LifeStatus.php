<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class LifeStatus extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->hasMany(Profile::class);
    }
}
