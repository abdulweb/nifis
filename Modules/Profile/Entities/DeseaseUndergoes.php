<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class DeseaseUndergoes extends Model
{
    protected $guarded = [];

    public function desease()
    {
    	return $this->belongsTo(Desease::class);
    }

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
