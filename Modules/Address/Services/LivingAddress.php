<?php

namespace Modules\Address\Services;

use Modules\Address\Entities\Town;

use Modules\Address\Entities\Area;

use Modules\Address\Services\BasAddress;

class LivingAddress extends BasAddress
{
 
    public $town;

    public function newTown(Lga $lga, $data)
    {
    	$this->town = $lga->towns()->firstOrCreate(['name'=>$data['town']]);
    }
    
    public $area;

    public function newArea(Town $town, $data)
    {
    	$this->area = $town->towns()->firstOrCreate(['name'=>$data['area']]);
    }

    public $house;

    public function newHouse(Area $area, $data)
    {
    	$this->house = $area->houses()->firstOrCreate([
    		'house_no'=>$data['house_no'],
    		'house_desc'=>$data['house_desc']
    	]);
    }

    public $id;

    public function newAddress(House $house, $data)
    {
    	$this->id = $house->address()->firstOrCreate([]);
    }

    public function address($data)
    {
        newCountry($data);
        newState($this->country, $data);
        newLga($this->state, $data);
        newTown($this->lga, $data);
        newHouse($this->town, $data);
        newAddress($this->house, $data);
    }

}