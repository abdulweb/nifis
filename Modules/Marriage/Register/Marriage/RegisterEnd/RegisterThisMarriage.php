<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use Modules\Marriage\Register\Marriage\RegisterEnd\MarriageInitiate;

use Modules\Family\Entities\Family;

use Modules\Address\Entities\Address;

use Modules\Address\Services\LivingAddress;

use App\User;

trait RegisterThisMarriage
{
   
    use MarriageInitiate, LivingAddress;

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
    		    $data['address'] = $this->address($data);
    			break;

    		case 'son':
    		    //prepare family data
		        $data['address'] = $this->address($data);
		        $family = Family::find(session('register')['family']);
		        $user = User::find($data['husband_first_name']);
                $data['family'] = $user->first_name.'_'.$family->name.'_child_'.$user->profile->child->birth->id;
                $data['title'] = $family->name.'_child_'.$user->profile->child->birth->id;
                $data['husband_email'] = $user->email;
                $data['new_husband_email'] = '';
                $data['tribe'] = $family->tribe_id;
                $data['location'] = $this->getLocation(Address::find($data['address']));
                    
    			break;
    		case 'daughter':
    			//need to prepare the data
    		    $data['address'] = $this->address($data);
		        $family = Family::find(session('register')['family']);
		        $user = User::find($data['wife_first_name']);
                $data['wife_email'] = $user->email;
                $data['wife_family'] = $user->profile->family->name;
                $data['wife_date'] = date('Y-m-d',$user->profile->child->birth->date);
                $data['family'] = $data['husband_first_name'].'_'.$family->name.'_inlaw_'.$user->profile->child->birth->id;
                $data['title'] = $family->name.'_inlaw_'.$user->profile->child->birth->id;
                $data['location'] = $this->getLocation(Address::find($data['address']));
    			break;
    		default:
    			# code...
    			break;
    	}
    	return $data;
   }

   public function getLocation(Address $address)
   {
   	   return $address->house->area->town->locations()->firstOrCreate([]);
   }
}