<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Country;

use Modules\Address\Entities\State;

use Modules\Address\Entities\Lga;

trait BaseAddress
{
	public $country;

    public function newCountry($data)
    {
    	$this->country = Country::firstOrCreate(['name'=>$data['country']]);
    }
    
    public $state;

    public function newState(Country $country, $data)
    {
    	$this->state = $country->states()->firstOrCreate(['name'=>$data['state']]);
    }

    public $lga;

    public function newLga(State $state, $data)
    {
    	$this->lga = $state->lgas()->firstOrCreate(['name'=>$data['lga']]);
    }
}