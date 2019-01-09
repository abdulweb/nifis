<?php

namespace Modules\Birth\Services\Register;

use Modules\Birth\Services\Register\Validation\ValidateBirthRequest;

use Modules\Birth\Events\NewBirthEvent;

class NewBirth

{

    use ValidateBirthRequest;

	public $data;

	public function __construct($data)
	{
		$this->data = $data;

		$this->register();
	}

    public function register()
    {
        $this->Validate();
        if($this->error == null){
        	$this->registerBirth();
        }else{
        	return redirect()->route('birth.index');
        }
    }

    public function registerBirth()
    {
        $birth = $this->mother->births()->create([
        	'child_id'=>$this->child->id,
        	'father_id'=>$this->father->id,
        	'date'=>$this->data['date'],
        	'weight' => $data['weight'],
        	'place' => $data['place'],
            'deliver_at' =>$data['deliver_at']

        ]);
        $address = $this->mother->wife->profile->leave->address_id;
        $this->child->profile->leave->create(['address_id'=>$address]);
          
    }


}
