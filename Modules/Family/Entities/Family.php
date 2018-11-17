<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = [];

    public function scale()
    {
    	return $this->belongsTo(FamilyScale::class);
    }

    public function religion()
    {
    	return $this->belongsTo(Religion::class);
    }

    public function tribe()
    {
    	return $this->belongsTo(Tribe::class);
    }
}
