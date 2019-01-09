<?php

namespace Modules\Birth\Services\Register;

use Modules\Birth\Services\Register\Validation\ValidateBirthRequest;



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
        	session()->flash('error',$this->error);
        }
    }

    public function registerBirth()
    {
    	
        $birth = $this->mother->births()->create([
        	'child_id'=>$this->child->id,
        	'father_id'=>$this->father->id,
        	'date'=>strtotime($this->data['date']),
        	'weight' => $this->data['weight'],
        	'place' => $this->data['place'],
            'deliver_at' =>$this->data['deliver_at']
        ]);
        $address = $this->mother->wife->profile->leave->address_id;
        $this->child->profile->leave()->create(['address_id'=>$address]);
          
    }


}
