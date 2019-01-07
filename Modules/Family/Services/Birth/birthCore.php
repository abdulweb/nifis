<?php

namespace Modules\Family\Services\Birth;

use Modules\Family\Entities\Family;

class birthCore

{
	public $father =  [];
	public $mothers = [];
	public $family =  [];
	public function __construct()
	{
        $this->birthInfo(); 
	} 

	public function birthInfo()
	{
		if(session('family')){
            $this->family = Family::find(session('register')['family']);
            $admin = $this->family->admin;
            $this->father = [
                'name'=>$this->family->admin->profile->user->first_name,
                'surname'=>$this->family->admin->profile->user->last_name,
                'user_id' => $this->family->admin->profile->user->id
            ];
            foreach($admin->profile->husband->marriages as $marriage){
            	$mother = $marriage->wife->profile->user;
            	$this->mother = [
	                'name' => $mother->first_name,
	                'sname' => $mother->last_name,
	                'user_id' =>$mother->id
                ];
            }
        }else{
        	$this->families = Family::all();
        }      
	}
}