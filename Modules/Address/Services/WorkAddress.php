<?php

namespace Modules\Address\Services;

use  Modules\Address\Services\BaseAddress;

trait WorkAddress 
{
   use BaseAddress;
   
   protected $company;

   protected $office;

   public $address;

   protected function newCompany(Town $town)
    {
    	$this->company = $town->companies()->firstOrCreate([
    		'company'=>$this->data['company']
    	]);
    }

    protected function newOffice(Company $company)
    {
    	$this->office = $company->offices()->firstOrCreate([
    		'office_name'=>$this->data['office']
    	]);
    }

	protected function newAddress(Office $office)
	{
		$this->address = $office->addresses()->create(['position'=>$this->data['position']]);
	}

    public function address()
    {
    	$this->newCountry();
        $this->newState($this->country);
        $this->newLga($this->state);
        $this->newTown($this->lga);
        $this->newCompany($this->town);
        $this->newOffice($this->company);
        $this->newAddress($this->office);
    }
}