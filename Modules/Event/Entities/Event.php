<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
