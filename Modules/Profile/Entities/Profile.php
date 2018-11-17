<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function child()
    {
    	return $this->hasOne(Children::class);
    }

    public function userMessage()
    {
    	return $this->hasMany(UserMessage::class);
    }

    public function message()
    {
    	return $this->hasMany(Message::class);
    }

    public function userImage()
    {
    	return $this->hasOne(UserImage::class);
    }

    public function userVedio()
    {
    	return $this->hasOne(UserVedio::class);
    }

    public function wife()
    {
    	return $this->hasOne(Wife::class);
    }
    
    public function husband()
    {
    	return $this->hasOne(Husband::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function businessUndergoes()
    {
    	return $this->belongsToMany(BusinessUndergoes::class);
    }

    public function deseaseUndergoes()
    {
    	return $this->belongsToMany(DeseaseUndergoes::class);
    }

    public function gender()
    {
    	return $this->belongsTo(Gender::class);
    }

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }

    public function life()
    {
    	return $this->belongsTo(LifeStatus::class);
    }

    public function maritalStatus()
    {
    	return $this->belongsTo(MaritalStatus::class);
    }

    public function userContact()
    {
    	return $this->hasMany(UserContact::class);
    }

    public function userDetail()
    {
    	return $this->hasMany(UserDetail::class);
    }
    
    public function UserHealth()
    {
    	return $this->belongsTo(UserHealth::class);
    }

    public function workHistory()
    {
    	return $this->hasMany(WorkHistory::class);
    }







}
