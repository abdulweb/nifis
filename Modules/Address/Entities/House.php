<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = [];

    public function area()
    {
        return $this->belongTo(Area::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
