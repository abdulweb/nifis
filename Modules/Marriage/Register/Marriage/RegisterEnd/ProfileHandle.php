<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use App\User;

class ProfileHandle
{
    public $data;
    
    public $husbandProfile;
    
    public $wifeProfile;

	public function __construct(User $user,$data)
	{
        $this->data = $data;
        $this->husbandProfile = $user->profile()
	}

	public function handleWifeProfile()
	{
		if(empty($this->data['wfamily'])){
            $user= User::create(['first_name'=>$this->data['wife_first_name'],'last_name'=>$this->data['wife_last_name']]);
            $this->wifeProfile = $user->profile()->create(['gender_id'=>2,'marital_status_id'=>2]);
		}else{
            $user = User::where('email',$this->data['wemail']);
            $this->wifeProfile = $user->profile();
		}
	}

	public function updateHusbandProfile()
	{
		if($this->husbandProfile->marital_status_id != 2){
			$this->husbandProfile->update(['marital_status_id'=>2])->save();
		}
	}

	public function handle()
	{
        $this->updateHusbandProfile();
        $this handleWifeProfile()
	}
}