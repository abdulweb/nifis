<?php

namespace Modules\Birth\Services\Register;

use Modules\Birth\Services\Register\Validation\ValidateBirthRequest;

use Modules\Birth\Entities\Deliver;

class NewBirth

{

    use ValidateBirthRequest;

	public $data;
    
    private $deliver_id;

	public function __construct($data)
	{
		$this->data = $data;

		$this->register();
	}

    public function register()
    {
        $this->Validate();
        if($this->error == null){
        	empty($this->data['midwifery_name']) || empty($this->data['midwifery_surname']) 

	        	? $this->deliver_id = 0 
	        	: $this->deliver_id = $this->deliveredBy();
        	
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
            'deliver_at' =>$this->data['deliver_at'],
            'deliver_id' =>$this->deliveredBy()
        ]);
        $address = $this->mother->wife->profile->leave->address_id;
        $this->child->profile->leave()->create(['address_id'=>$address]);
          
    }
    public function deliveredBy()
    {
    	$deliver = Deliver::firstOrCreate(['first_name'=>$this->data['midwifery_name'],'last_name'=>$this->data['midwifery_surname']]);
    	return $deliver->id;
    }

}
