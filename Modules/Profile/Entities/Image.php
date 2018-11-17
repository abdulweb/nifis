<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
