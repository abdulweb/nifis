<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class Divorce extends Model
{
    protected $guarded = [];

    public function married()
    {
        return $this->belongTo(Married::class);
    }
    
}
