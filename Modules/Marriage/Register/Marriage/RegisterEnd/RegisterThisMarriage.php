<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use Modules\Marriage\Register\Marriage\RegisterEnd\MarriageInitiate;

use Modules\Family\Entities\Family;

use Modules\Address\Entities\Address;

use Modules\Services\LivingAddress;

trait RegisterThisMarriage
{
   
    use MarriageInitiate LivingAddress;

    public function register()
    {
        $this->handle();
        $this->createHusband($this->husbandProfile);
        $this->createWife($this->wifeProfile);
        $this->createMarriage($this->husband);
        $this->marriageAddress();
    }

    public function prepareData($data)
    {
    
    	switch (session('register')['status']) {
    		case 'father':

    			//data was already prepared
    		    $data['address'] = $this->newAddress($data)
    			break;

    		case 'son':
    		    //prepare family data

		        $data['address'] = $this->newAddress($data)
		        $family = Family::find(session('register')['family']);
		        $user = User::find($data['husband_first_name']);
                $data['family'] = $user->first_name.'_'.$family->name.$user->id;
                $data['title'] = $family->name.$data['user_id'];
                $data['tribe'] = $family->tribe_id;
                $data['location'] = $this->getLocation($data['address']);
                    
    			break;
    		case 'daughter':
    			//need to prepare the data
    			break;
    		default:
    			# code...
    			break;
    	}
    	return $datas
   }

   public function getLocation(Address $address, $data)
   {
   	   return $address->house->area->town->name;
   }
}