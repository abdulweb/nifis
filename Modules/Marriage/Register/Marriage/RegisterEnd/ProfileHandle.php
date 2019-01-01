<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use App\User;

trait ProfileHandle
{
    
    public $husbandProfile;
    
    public $wifeProfile;

	
	public function handleWifeProfile()
	{
		if(empty($this->data['wfamily'])){
            $user= User::create(['first_name'=>$this->data['wife_first_name'],'last_name'=>$this->data['wife_last_name'],'date_of_birth'=>$this->date['wife_date']]);
            $this->wifeProfile = $user->profile()->create(['gender_id'=>2,'marital_status_id'=>2]);
		}else{
            $user = User::where('email',$this->data['wemail']);
            $this->wifeProfile = $user->profile();
		}
	}

    public function handleHusbandProfile()
	{
		$this->husbandProfile = User::find($this->data['user_id'])->profile();
		$this->updateHusbandProfile();
	}

	public function updateHusbandProfile()
	{
		if($this->husbandProfile->marital_status_id != 2){
			$this->husbandProfile->update(['marital_status_id'=>2])->save();
		}
	}

	public function handle()
	{
        $this->handleWifeProfile();
        $this->handleHusbandProfile();
	}
}