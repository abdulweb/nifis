<?php

namespace Modules\Family\Services\Account;

use App\User;
use Modules\Family\Entities\Family;
use Modules\Family\Entities\Tribe;
use Modules\Address\Entities\Location;
use Modules\Address\Entities\Country;
use Modules\Address\Entities\State;
use Modules\Address\Entities\Lga;
use Illuminate\Support\Facades\Hash;

class NewFamily 
{

	public $user;

    public $tribe;

    public $family;

    public $admin;

    public $profile;

    public $location;
    
	public function register($data){

        $this->newUser($data);
        $this->newProfile($this->user);
        $this->familyLocation($data);
        $this->newTribe($data);
        $this->newFamily($data);
        $this->newAdmin();
        
	}
    

    public function newFamily($array){
        $this->family = $this->location->family->create([
            'family'=>$array['family'],
            'title' => $array['title'],
            'tribe_id'=>$this->tribe->id
        ]);
    }

    public function newTribe($array){
        $this->tribe = Tribe::firstOrCreate(['tribe'=>$array['tribe']]);
    }

    public function newAdmin(Admin $admin){
    	$this->admin = $this->family->admin->create(['profile_id'=>$this->profile->id]);
    }

    public function familyLocation(Locattion $locate, State $state, Country $country, $array){
        $lga = $country->find(1)->state->firstOrCreate(['name'=>$array['state']])->lgas->firstOrCreate(['name',$array['lga']]);
        $this->location = $lga->location->firstOrCreate($array['location']);
    }

    public function newUser($array)
    {
        $this->user = User::firstOrCreate([
            'first_name'=>$array['name'],
            'last_name'=>$array['sname'],
            'email'=>$array['email'],
            'password'=>Hash::make($array['password']),
            'phone'=>'',
        ]);
    }
    
    

    public function newProfile(User $user)
    {
        dd($user);
    	$this->user->profile->create([
            'gender_id'         => 1,
            'marital_status_id' => 1
        ]);
    }
}