<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

}
