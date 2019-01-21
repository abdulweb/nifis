<?php

namespace Modules\Divorce\Services\Registration;

/**
* this class will take the husband and wife information and de activate their marriage
*/
class DivorceWife 
{
	protected $wife;

	function __construct($data)
	{
		$this->data = $data;
		$this->validate();
		$this->divorce();
	}

	protected function divorce()
	{
        if($this->error == null){
        	foreach($this->wife->marriages as $marriage){
	        	if($marriage->is_active == 1){
	        		if($marriage->divorce == null){
		        		$divoce = $marriage->divorce()->firstOrCreate([
		        			'counter' => 1
		        	    ]);
	        		}else{
	                    $divoce = $marriage->divorce()->firstOrCreate([
		        			'counter' => $marriage->divorce->couter++;
		        	    ]);
	        		}
	        		$marriage->update(['is_active'=>0]);
	        	    $divorce->details()->create([
	                    'date'=>strtotime($this->data['date']),
	        			'reson'=>$this->data['reason'],
	        	    ]);
	        	}
	        }
        }else{
        	session()->flash('error',$this->erro)
        }
	}

	protected function validate()
	{
        $this->wife = User::find($this->data['first_name'])->profile->wife;
		if($this->wife->marriage->date < strtotime($this->data['date'])){
			$this->error = 'Divorce date Authentication fails : the marriage date is greater than divorce date';
		}
	}
}