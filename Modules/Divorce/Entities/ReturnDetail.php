<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class ReturnDetail extends Model
{
    protected $guarded = [];

    public function divorceDetail()
    {
    	return $this->belongsTo(DivorceDetail::class);
    }
}
