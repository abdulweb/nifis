<?php

namespace Modules\Death\Services\Registration;

use App\User;

class NewDeath

{
	public $data;

	public function __construct($data)

	{
		$this->data = $data;
		$this->registerDeath();
	}

	protected function registerDeath()

	{
		$user = User::find($this->data['first_name']);
		switch (session('death')['status']) {
			case 'husband':
				foreach($user->profile->husband->marriages as $marriage){
					$marriage->update(['is_active'=> 0]);
				}
				break;
			case 'wife':
				foreach($user->profile->wife->marriages as $marriage){
					$marriage->update(['is_active'=> 0]);
				}
				break;
				case 'child':
				if($user->profile->husband != null){
                    foreach($user->profile->husband->marriages as $marriage){
						$marriage->update(['is_active'=> 0]);
					}
				}
				break;
			default:
				foreach($user->profile->wife->marriages as $marriage){
					$marriage->update(['is_active'=> 0]);
				}
				break;
		}
		$user->profile->death()->create(['date'=>$this->data['data'],'place'=>$this->data['place'],'death_at'=>$this->data['death_at']]);
		$user->profile->update(['life_status_id'=>0,'is_active'=>0]);
	}
}