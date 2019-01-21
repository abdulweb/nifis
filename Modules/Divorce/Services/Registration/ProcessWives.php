<?php

/**
* this class will prcess currently logged in user
*/
class ProcessWives
{
	public validWives;

	protected $user;

	function __construct()
	{
		$this->user = $user;
		$this->processed();
	}

	protected function processed()
	{
		$wives = [];
		foreach($this->user->profile->husband->marriages as $marriage){
			if($marriage->is_active == 1){
				$wives[] = $marriage->wife;
			}
		}
		$this->validWives = $wives;
	}
}