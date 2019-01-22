<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Country;

use Modules\Address\Entities\State;

use Modules\Address\Entities\Lga;


trait WorkBaseAddress
{
	public $country;

    public function newCountryWork()
    {
    	$this->country = Country::firstOrCreate(['name'=>$this->data['country']]);
    }
    
    public $state;

    public function newStateWork(Country $country)
    {
    	$this->state = $country->states()->firstOrCreate(['name'=>$this->data['state']]);
    }

    public $lga;

    public function newLgaWork(State $state)
    {
    	$this->lga = $state->lgas()->firstOrCreate(['name'=>$this->data['lga']]);
    }

    public $town;

    public function newTownWork(Lga $lga)
    {
        $this->town = $lga->towns()->firstOrCreate(['name'=>$this->data['town']]);
    }
}