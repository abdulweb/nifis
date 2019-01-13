<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Entities\Tribe;
use Modules\Address\Entities\Location;
use Modules\Address\Services\FamilyLocation;
use Modules\Family\Services\Account\Admin;


trait Family

{

	use Admin;

    public $location;

    public $family;

	public function registerFamily(){
		
        $this->newFamily($this->data['location']);
        $this->newAdminHandle();

        if(session('register')['status'] == 'son'){
            $this->createSubFamily();
        }

	}

    private function newFamily(Location $location){
        
        $this->family = $location->families()->create([
            'name'=>$this->data['family'],
            'title' => $this->data['title'],
            'tribe_id'=>$this->data['tribe'],
            'user_id'=>Auth()->User()->id,
        ]);
    }

    private function createSubFamily()
    {
    	$this->user->profile->family->subFamilies()->create(['sub_family_id'=>$this->family->id]);
    }
}