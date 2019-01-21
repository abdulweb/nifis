<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    protected $guarded = [];

    public function divorce()
    {
        return $this->belongsTo(Dirvorce::class);
    }
}
