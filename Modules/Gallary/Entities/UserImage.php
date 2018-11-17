<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{

	protected $guarded = [];

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
