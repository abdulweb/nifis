<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Father extends Model
{
    protected $guarded = [];

    public function husband()
    {
        return $this->belongTo('Modules\Marriage\Entities\Husband');
    }
    public function births()
    {
        return $this->hasMany(Birth::class);
    }
}
