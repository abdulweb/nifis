<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function lgas()
    {
        return $this->hasMany(Lga::class);
    }
}
