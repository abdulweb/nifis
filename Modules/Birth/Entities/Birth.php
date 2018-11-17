<?php

namespace Modules\Birth\Entities;

use Illuminate\Database\Eloquent\Model;

class Birth extends Model
{
    protected $guarded = [];

    public function father()
    {
        return $this->belongTo(Father::class);
    }

    public function child()
    {
        return $this->belongTo(Children::class);
    }

    public function mother()
    {
        return $this->belongTo(Mother::class);
    }
    
    public function user()
    {
        return $this->belongTo(Users::class);
    }
}
