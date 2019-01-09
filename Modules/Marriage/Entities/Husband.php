<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Husband extends Model
{

    protected $guarded = [];

    public function marriages()
    {
    	return $this->hasMany(Married::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
    public function father()
    {
    	return $this->hasOne('Modules\Birth\Entities\Father');
    }
}
