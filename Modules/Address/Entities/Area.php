<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $guarded = [];

    public function house()
    {
        return $this->hasMany(House::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }

    public function town()
    {
        return $this->belongsTo(Town::class);
    }
}
