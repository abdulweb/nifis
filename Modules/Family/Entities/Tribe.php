<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class Tribe extends Model
{
    protected $guarded = [];

    public function family()
    {
    	return $this->hasMany(Family::class);
    }
}
