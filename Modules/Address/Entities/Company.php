<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function town()
    {
    	return $this->belongsTo(Town::class);
    }

    public function offices()
    {
    	return $this->hasMany(Office::class);
    }
}
