<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $guarded = [];

    public function lga()
    {
        return $this->belongTo(Lga::class);
    }

    public function areas()
    {
        return $this->hasMany(Area::class);
    }
}
