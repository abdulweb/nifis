<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Family\Entities\Family;



class VerifyHusbandInWifeFamily extends VerifyHusband
{

	public function familyAuth($data)
	{
        if(blank(Family::where('title',$data['wfamily'])->get())){
        	$this->error = ["Sorry the wife family authentication fails the family does not exist"];;
        }
	}

    public function husbandAuth(User $user $data)
    {
        foreach($user->profile()->husband->marriages() as $marriage){
        	if($marriage->is_active == 1 && $marriage->wife()->family_id == Family::where('title',$this->data['wfamily'])->id->get()){
        		if(blank(Family::where('title',$data['wfamily'])->get())){
		        	$this->error = ["Sorry the husband authentication in wife family fails the he has already married in the family"];
		        }
        	}
        }
    }

}