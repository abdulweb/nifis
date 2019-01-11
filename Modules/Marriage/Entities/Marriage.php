<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    protected $guarded = [];

    public function wife()
    {
        return $this->belongsTo(Wife::class);
    }

    public function husband()
    {
        return $this->belongsTo(Husband::class);
    }
}
