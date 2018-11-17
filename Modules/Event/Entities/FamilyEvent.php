<?php

namespace Modules\Event\Entities;

use Illuminate\Database\Eloquent\Model;

class FamilyEvent extends Model
{
    protected $guarded = [];

    public function family()
    {
    	return $this->belongsTo(Family::class);
    }
}
