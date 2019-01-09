<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class LivesIn extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongTo('Modules\Profile\Entities\Profile');
    }

    public function address()
    {
        return $this->belongTo(Address::class);
    }
}
