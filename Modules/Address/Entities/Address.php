<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function leaves()
    {
        return $this->hasMany(LivesIn::class);
    }

    public function work_in()
    {
        return $this->hasOne(WorkIn::class);
    }

     public function office()
    {
        return $this->belongsTo(Office::class);
    }

     public function house()
    {
        return $this->belongsTo(House::class);
    }
}
