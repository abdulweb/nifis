<?php

class VerifyHusbandInWifeFamily
{
	
	public function familyAuth(User $user)
	{
        if(blank(Family::where('title',$this->data['wfamily'])->get())){
        	$this->error = ["Sorry the wife family authentication fails the family does not exist"];;
        }
	}

    public function husbandAuth(User $user)
    {
        foreach($user->profile()->husband->marriages() as $marriage){
        	if($marriage->is_active == 1 && $marriage->wife()->family_id == Family::where('title',$this->data['wfamily'])->id->get()){
        		if(blank(Family::where('title',$this->data['wfamily'])->get())){
		        	$this->error = ["Sorry the husband authentication in wife family fails the he has already married in the family"];
		        }
        	}
        }
    }

}