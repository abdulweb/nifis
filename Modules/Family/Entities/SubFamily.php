<?php

namespace Modules\Family\Entities;

use Illuminate\Database\Eloquent\Model;

class SubFamily extends Model
{
    protected $guarded = [];

    public function family()
    {
    	return $this->belongsTo(Family::class);
    }
}
