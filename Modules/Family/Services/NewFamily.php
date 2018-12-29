<?php
namespace Modules\Services\Family;

class NewFamily 
{
	public $admin;
	public $family;
    public $user;
    public $profile;

	public function register($data){

        $this->newFamily($data);
        $this->newUser($data)
        $this->newProfile();
        $this->newAdmin();

	}

    public function newFamily(Family $family,$array){
        $this->family = $family->create($array);
    }

    public function newAdmin(Admin $admin){
    	$this->admin = $admin->create(['profile_id'=>$this->user->id,'family_id'=>$this->family->id])
    }

    public function location(Locattion $locate, State $state, Country $country, $array){
    	
    }

    public function newUser(User $user,$array)
    {
        $this->user = $user->create($array);
    }

    public function newProfile(Profile $profile)
    {
    	$profile->create(['user_id'=>$this->user->id]);
    }
}