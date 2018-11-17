<?php

namespace Modules\Gallary\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyImage extends Model
{
   
    protected $guarded = [];

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }

    public function family()
    {
    	return $this->belongsTo(Family::class);
    }
}
