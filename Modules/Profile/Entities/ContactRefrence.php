<?php

namespace Modules\Profile\Entities;

use Illuminate\Database\Eloquent\Model;

class ContactRefrence extends Model
{
	protected $guarded = [];
	
    public function contact()
    {
    	return $this->hasMany(UserContact::class);
    }
}
