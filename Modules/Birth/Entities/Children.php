<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    protected $giuarded = [];

    public function profile()
    {
        return $this->belongTo(Profile::class);
    }

    public function birth()
    {
        return $this->hasOne(Birth::class);
    }
    
}
