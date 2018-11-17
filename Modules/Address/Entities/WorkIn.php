<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class WorkIn extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongTo(Profile::class);
    }

    public function address()
    {
        return $this->belongTo(Address::class);
    }
}
