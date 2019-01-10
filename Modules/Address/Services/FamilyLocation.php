<?php

namespace Modules\Address\Services;

use Modules\Address\Services\BasAddress;

use Modules\Address\Entities\Lga;

trait FamilyLocation
{
   
    use BaseAddress;

    public $location;

    public function location(){
        $this->newCountry($this->data);
        $this->newState($this->country);
        $this->newLga($this->state);
        $this->newLocation($this->lga);
    }

    public function newLocation(Lga $lga)
    {
        $this->location = $lga->locations()->firstOrCreate(['location'=>$this->data['location']]);
    }
}