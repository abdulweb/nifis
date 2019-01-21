<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $guarded = [];

    public function divorce()
    {
    	return $this->belongsTo(Divorce::class);
    }
}
