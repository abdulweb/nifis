<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    protected $guarded = [];

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public function desease()
    {
    	return $this->belongsTo(Desease::class);
    }
}
