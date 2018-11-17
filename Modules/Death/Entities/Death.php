<?php

namespace Modules\Death\Entities;

use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongTo(Profile::class);
    }
    
}
