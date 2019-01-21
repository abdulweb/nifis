<?php

namespace Modules\Divorce\Entities;

use Illuminate\Database\Eloquent\Model;

class Divorce extends Model
{
    protected $guarded = [];

    public function marriage()
    {
        return $this->belongsTo('Modules\Marriage\Entities\Marriage');
    }

    public function details()
    {
        return $this->hasMany(DivorceDetail::class);
    }
}
