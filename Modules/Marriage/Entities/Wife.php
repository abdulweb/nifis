<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{

    protected $guarded = [];

    public function marriages()
    {
    	return $this->hasMany(Married::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function status()
    {
    	return $this->belongsTo(Profile::class);
    }
    
}
