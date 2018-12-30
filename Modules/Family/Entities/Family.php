<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $guarded = [];
    
    public function admin()
    {
    	return $this->hasOne('Modules\Admin\Entities\Admin');
    }

    public function familyEvent()
    {
    	return $this->hasMany(FamilyEvent::class);
    }
    public function location()
    {
        return $this->hasOne('Modules\Address\Entities\Location');
    }
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

    public function profile()
    {
    	return $this->hasMany(Profile::class);
    }

    public function image()
    {
    	return $this->hasMany(Image::class);
    }

    public function vedio()
    {
    	return $this->hasMany(Vedio::class);
    }
}
