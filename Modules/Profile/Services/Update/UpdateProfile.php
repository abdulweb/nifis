<?php

namespace Modules\Profile\Services\Update;

use Modules\Address\Services\LivingAddress;

use Modules\Address\Services\WorkAddress;

/**
* this class will recieved the user information and update his profile
*/
class UpdateProfile
{
	public $data
	
	function __construct($data)
	{
		$this->data = $data;
		$this->user = $data['user'];
		$this->update();
	}

	protected function update()
	{
		switch ($this->data['submit']) {
            case 'new_contact':
                # code...
                break;
            case 'change_profile_image':
                # code...
                break;
            
            case 'new_certificate':
                # code...
                break;
            
            case 'profile_image':
                # code...
                break;
            
            case 'new_experience':
                # code...
                break;
            
            case 'new_skill':
                # code...
                break;
            
            case 'work_history':
                # code...
                break;
            case 'new_business':
                # code...
                break;
            case 'business_address':
                use WorkAddress;
                $this->user->profile->work->update(['address_id'=>$this->address()]);
                session()->flash('message','The profile business address updated');
                break;
            case 'home_address':
                use LivingAddress;
                $this->user->profile->leave->update(['address_id'=>$this->address()]);
                session()->flash('message','The profile home address updated');
                break;
            
            case 'new_biography':
               # code...
                break;
            
            default:
                # code...
                break;
        }
	}
}