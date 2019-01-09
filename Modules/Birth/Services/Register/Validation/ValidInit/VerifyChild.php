<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

trait VerifyChild

{
	private $user;

	private $profile;

	public $child;

	public function createUser()
	{
		$this->user = create(['first_name'=>$this->data['child_name'],'last_name'=>$this->data['father_first_name']]); 
	}

	public function childProfile()
	{
		$this->profile = $this->user()->profile->create(['gender_id'=>$data['gender'],'family_id'=>session('family')['family']]);
	}

	public function createChild()
	{
        $this->child = $this->profile()->child->create([]);
	}

	public function handleChildProfile()
	{
		$this->createUser();
		$this->childProfile();
		$this->createChild();
	}
}