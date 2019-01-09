<?php

namespace Modules\Marriage\Entities;

use Illuminate\Database\Eloquent\Model;

class Wife extends Model
{

    protected $guarded = [];

    public function marriage()
    {
    	return $this->hasOne(Married::class);
    }

    public function profile()
    {
    	return $this->belongsTo('Modules\Profile\Entities\Profile');
    }

    public function status()
    {
    	return $this->belongsTo(Status::class);
    }

    public function mother()
    {
        return $this->belongsTo('Modules\Birth\Entities\Mother');
    }
    
}
