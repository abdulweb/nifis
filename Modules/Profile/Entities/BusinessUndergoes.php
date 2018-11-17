<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class BusinessUndergoes extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function business()
    {
    	return $this->belongsTo(Business::class);
    }
}
