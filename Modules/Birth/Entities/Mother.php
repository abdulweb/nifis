<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $guaerded = [];

    public function wife()
    {
        return $this->belongTo(Wife::class);
    }
    
    public function birth()
    {
        return $this->hasMany(Birth::class);
    }
}
