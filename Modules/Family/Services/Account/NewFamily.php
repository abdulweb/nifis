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
use Modules\Address\Services\FamilyLocation;
class NewFamily 
{

	public $user;

    public $tribe;

    public $family;

    public $admin;

    public $profile;

    public $location;

    public $registerer;

    public function __construct(User $user)
    {
        $this->registerer = Auth()->User();
    }

	public function register(FamilyLocation $location, $data){
        $this->newUser($data);
        $this->newProfile($this->user,$data);
        $this->location = $location->location($data);
        $this->newTribe($data);
        $this->newFamily($this->location, $data);
        $this->newAdmin($this->profile, $this->family,$data);
	}

    public function newFamily(Location $location, $array){
        $this->family = $this->location->families()->create([
            'name'=>$array['family'],
            'title' => $array['title'],
            'tribe_id'=>$this->tribe->id,
            'user_id'=>$this->registerer->id,
        ]);
    }
    public function newTribe($array){
        $this->tribe = Tribe::firstOrCreate(['name'=>$array['tribe']]);
    }

    public function newAdmin(Profile $profile, Family $family,$data){
    	$this->admin = $family->admin()->create(['profile_id'=>$this->profile->id]);
        $this->profile->update(['family_id'=>$family->id])->save();
    }

    public function newUser($array)
    {
        if(empty($array['date'])){
            $this->user = Auth()->User();
        }else{
            $this->user = User::firstOrCreate([
                'first_name'=>$array['name'],
                'last_name'=>$array['sname'],
                'email'=>$array['email'],
                'password'=>Hash::make($array['password']),
                'phone'=>'',
            ]); 
        }
        
    }
   
    public function newProfile(User $user, $data)
    {
        if(empty($array['date'])){
            $array['date'] = $data['mdate'];
        }
    	$this->profile = $user->profile()->create([
            'gender_id'         => 1,
            'marital_status_id' => 1,
            'date_of_birth' => $data['date']
        ]);
    }
}