<?php

namespace Modules\Address\Services;

use  Modules\Address\Services\WorkBaseAddress;
use  Modules\Address\Entities\Town;
use  Modules\Address\Entities\Office;
use  Modules\Address\Entities\Company;

trait WorkAddress
{
   use WorkBaseAddress;

   protected $company;

   protected $office;

   public $address;

   protected function newCompany(Town $town)
    {
    	$this->company = $town->companies()->firstOrCreate([
    		'name'=>$this->data['company']
    	]);
    }

    protected function newOffice(Company $company)
    {
    	$this->office = $company->offices()->firstOrCreate([
    		'name'=>$this->data['office']
    	]);
    }

	protected function newWorkAddress(Office $office)
	{
		$this->address = $office->address()->create(['position'=>$this->data['position']]);
	}

    public function workAddress()
    {
    	$this->newCountryWork();
        $this->newStateWork($this->country);
        $this->newLgaWork($this->state);
        $this->newTownWork($this->lga);
        $this->newCompany($this->town);
        $this->newOffice($this->company);
        $this->newWorkAddress($this->office);
        return $this->address->id;
    }
}