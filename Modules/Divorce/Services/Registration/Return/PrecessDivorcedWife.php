<?php

/**
* this class will process and return a user divorce wife that can still be return
*/
class PrecessDivorcedWife
{
	
	public $validWives;

	protected $user;

	function __construct()
	{
		$this->user = Auth()->User();
		$this->processed();
	}

	protected function processed ()
	{
		$wives = [];
		foreach($this->user->profile->husband->marriages as $marriage){
			if($marriage->is_active == 0 && $marriage->divorce->counter < 4){
				$married == false;
				foreach ($marriage->wife->marriages as $other_marriage) {
					if ($other_marriage->is_active == 1) {
						$married == true;
					}
				}
				if (!$married) {
                    $wives[] = $marriage->wife;
				}
			}
		}
		$this->validWives = $wives;
	}
}