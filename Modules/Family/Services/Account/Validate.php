<?php
namespace Modules\Family\Services\Account;

use Modules\Address\Entities\Town;

trait Validate

{
	public $error = [];

	public function adminAuth()
	{
       $this->data['mdate'] == null ? $date = $this->data['date'] : $date = $this->data['mdate'];
       time() - strtotime($date) < 567648000 ? $this->error[] = "Family Root authentication fails the base on date specify root is too young to have a family" : $this->error = $this->error;
	}

	public function familyNameAuth()
	{
		foreach(Town::where('name',$this->data['location'])->get() as $location){
			if($location->family && $location->family->name == $this->data['family']){
				$this->error[] = "Family Name Authentication fails the family name was already used in your specify location";
			}
		}
	}

	public function validateFamilyRequest()
	{
		$this->adminAuth();
		$this->familyNameAuth();
	}
}
