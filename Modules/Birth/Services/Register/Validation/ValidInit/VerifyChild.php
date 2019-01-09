<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

use App\User;
trait VerifyChild

{
	private $user;

	private $profile;

	public $child;

	public function createUser()
	{
		$this->user = User::create(['first_name'=>$this->data['child_name'],'last_name'=>$this->data['father_first_name']]); 
	}

	public function childProfile()
	{
		$this->profile = $this->user->profile()->firstOrCreate(['gender_id'=>$this->data['gender'],'family_id'=>session('family')['family']]);
	}

	public function createChild()
	{
        $this->child = $this->profile->child()->firstOrCreate([]);
	}

	public function handleChildProfile()
	{
		$this->createUser();
		$this->childProfile();
		$this->createChild();
	}
}