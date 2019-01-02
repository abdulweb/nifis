<?php

namespace Modules\Address\Services;

use Modules\Address\Services\BasAddress;

class FamilyLocation extends BasAddress
{
    public function location($array){
        $this->newCountry($array);
        $this->newState($this->country, $array);
        $this->newLga($this->state,$array);
        $this->newLocation($this->lga,$array);
    }

    public function newLocation(Lga $lga, $data)
    {
        $this->location = $lga->locations()->firstOrCreate(['location'=>$data['location']]);
    }
}