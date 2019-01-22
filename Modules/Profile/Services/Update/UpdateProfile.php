<?php

/**
* this class will recieved the user information and update his profile
*/
class UpdateProfile
{
	public $data
	
	function __construct($data)
	{
		$this->data = $data;
	}

	use WorkAddress,HouseAddress;
}