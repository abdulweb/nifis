<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class GalarryImage extends Model
{
    protected $guarded = [];

    public function userImage()
    {
    	return $this->hasMany(UserImage::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
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
