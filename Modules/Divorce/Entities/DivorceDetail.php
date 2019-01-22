<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class DivorceDetail extends Model
{
    protected $guarded = [];

    public function divorce()
    {
    	return $this->belongsTo(Divorce::class);
    }
    public function return()
    {
    	return $this->hasOne(ReturnDetail::class);
    }
}
