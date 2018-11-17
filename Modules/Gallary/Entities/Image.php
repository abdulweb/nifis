<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function userImage()
    {
    	return $this->hasMany(UserImage::class);
    }

    public function familyImage()
    {
    	return $this->hasMany(FamilyImage::class);
    }

    public function userVedio()
    {
    	return $this->hasMany(UserVedio::class);
    }

    public function familyVedio()
    {
    	return $this->hasMany(FamilyVedio::class);
    }
}
