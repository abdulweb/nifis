<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use App\User;

trait ProfileHandle
{
    
    public $husbandProfile;
    
    public $wifeProfile;

	public function handleWifeProfile()
	{
		if(empty($this->data['wife_family'])){
            $user= User::create(['first_name'=>$this->data['wife_first_name'],'last_name'=>$this->data['wife_last_name']]);
            $this->wifeProfile = $user->profile()->create(['gender_id'=>2,'marital_status_id'=>2,'date_of_birth'=>strtotime($this->data['wife_date'])]);
		}else{
            $user = User::where('email',$this->data['wife_email'])->get();
            $this->wifeProfile = $user->profile;
		}
	}

    public function handleHusbandProfile()
	{
	
		if(session('register') == 'father'){
			$this->husbandProfile = User::find($this->data['user_id'])->profile;
		}else{
			$this->husbandProfile = User::find($this->data['husband_first_name'])->profile;
		}
		$this->updateHusbandProfile();

	}

	public function updateHusbandProfile()
	{
        
		if($this->husbandProfile->marital_status_id != 2){
			$this->husbandProfile->update(['marital_status_id'=>2]);
		}
	}

	public function handle()
	{
		
        $this->handleHusbandProfile();
        $this->handleWifeProfile();
	}

}