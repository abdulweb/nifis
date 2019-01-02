<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Family\Entities\Family;

use App\User;

class VerifyHusbandInWifeFamily extends VerifyHusband
{

	public function familyAuth($data)
	{
		if($user = User::where('email',$data['wife_email'])->get()->isNotEmpty()){
            if($user->profile()->family_id){
	        	$this->error = ["Sorry the wife family authentication fails the the wife email does not belongs to any family in our record"];
	        }
		}else{
			$this->error = ["Sorry the wife family authentication fails the the wife email does not exist in our record"];
		}
        
	}

    public function husbandAuth(User $user, $data)
    {
        foreach($user->profile()->husband()->marriages() as $marriage){
        	if($marriage->is_active == 1 && $marriage->wife()->profile()->family_id == Family::where(User::where('email',$data['wife_email'])->id->get)->id){
        		if(blank(Family::where('title',$data['wfamily'])->get())){
		        	$this->error = ["Sorry the husband authentication in wife family fails the he has already married in the family"];
		        }
        	}
        }
    }

}