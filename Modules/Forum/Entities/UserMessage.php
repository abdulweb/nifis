<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $guarded = [];

    public function message()
    {
    	return $this->belongsTo(Message::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
