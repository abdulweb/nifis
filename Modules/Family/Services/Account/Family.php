<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Entities\Tribe;
use Modules\Address\Entities\Location;
use Modules\Address\Services\FamilyLocation;
use Modules\Family\Services\Account\Admin;


trait Family

{

	use FamilyLocation, Admin;

    public $family;

	public function registerFamily(){
        
        $this->location();
        $this->newFamily($this->location);
        $this->newAdminHandle();
	}

    private function newFamily(Location $location){
        $this->family = $this->location->families()->create([
            'name'=>$this->data['family'],
            'title' => $this->data['title'],
            'tribe_id'=>$this->data['tribe'],
            'user_id'=>$this->registerer->id,
        ]);
    }
}