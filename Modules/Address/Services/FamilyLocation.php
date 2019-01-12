<?php

namespace Modules\Address\Services;

use Modules\Address\Services\BasAddress;

use Modules\Address\Entities\Town;

trait FamilyLocation
{
   
    use BaseAddress;

    public $location;

    public function location(){
    
            $this->newCountry($this->data);
            $this->newState($this->country);
            $this->newLga($this->state);
            $this->newTown($this->lga);
            $this->newLocation($this->town);
        
        
        
    }

    public function newLocation(Town $town)
    {
        $this->location = $town->locations()->firstOrCreate([]);
    }
}