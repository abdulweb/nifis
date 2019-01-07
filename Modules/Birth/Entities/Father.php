<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $guarded = [];

    public function husband()
    {
        return $this->belongTo(Husband::class);
    }
    public function birth()
    {
        return $this->hasMany(Birth::class);
    }
}
