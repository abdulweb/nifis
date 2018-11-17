<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongTo(Country::class);
    }

    public function lga()
    {
        return $this->hasMany(Lga::class);
    }
}
