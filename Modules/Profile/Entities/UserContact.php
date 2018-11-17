<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $guarded = [];

    public function belongsTo()
    {
    	return $this->hasOne(Profile::class);
    }
}
