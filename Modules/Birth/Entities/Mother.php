<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Mother extends Model
{
    protected $guaerded = [];

    public function wife()
    {
        return $this->belongsTo('Modules\Marriage\Entities\Wife');
    }
    
    public function births()
    {
        return $this->hasMany(Birth::class);
    }
}
