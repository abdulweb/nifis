<?php

namespace Modules\Address\Services;

class BaseAddress
{
    public function newCountry($data)
    {
    	$this->country = Country::firstOrCreate(['name'=>$data['country']]);
    }

    
}