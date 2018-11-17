<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class ExtendFamilyMessage extends Model
{
    protected $guarded = [];

    public function message()
    {
    	return $this->belongsTo(Message::class);
    }

    public function family()
    {
    	return $this->belongsTo(Family::class);
    }
    
}
