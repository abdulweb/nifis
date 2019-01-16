<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Husband extends Model
{

    protected $guarded = [];

    public function marriages()
    {
    	return $this->hasMany(Marriage::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }
    public function father()
    {
    	return $this->hasOne('Modules\Birth\Entities\Father');
    }
}
