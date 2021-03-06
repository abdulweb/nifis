<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
    
}
