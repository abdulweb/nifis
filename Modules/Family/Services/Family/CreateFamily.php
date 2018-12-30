<?php
namespace Modules\Family\Services\Family;

use App\User;
use Modules\Profile\Entities\Profile;
use Modules\Family\Entities\Family;
use Modules\Admin\Entities\Admin;
use Modules\Address\Entities\Location;

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
        $this->familyLocation($data);
	}

    public function newFamily(Family $family,$array){
        $this->family = $family->create($array);
    }

    public function newAdmin(Admin $admin){
    	$this->admin = $this->family->admin->create(['profile_id'=>$this->profile->id])
    }

    public function familyLocation(Locattion $locate, State $state, Country $country, $array){
        $lga = $country->find(1)->state->firstOrCreate($array['state'])->lgas->firstOrCreate($array['lga']);
        $lga->location->firstOrCreate($array['location']);
    }

    public function newUser(User $user,$array)
    {
        $this->user = $user->create($array);
    }

    public function newProfile(Profile $profile)
    {
    	$this->user->profile->create(['gender_id'=>1]);
    }
}