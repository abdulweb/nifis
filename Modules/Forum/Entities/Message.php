<?php

namespace Modules\Forum\Entities;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function userMessage()
    {
    	return $this->hasMany(UserMessage::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function familyMessage()
    {
    	return $this->hasMany(FamilyMessage::class);
    }

    public function extendFamilyMessage()
    {
    	return $this->hasMany(Family::class);
    }
}
