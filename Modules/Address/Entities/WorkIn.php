<?php

namespace Modules\Address\Entities;

use Illuminate\Database\Eloquent\Model;

class WorkIn extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
