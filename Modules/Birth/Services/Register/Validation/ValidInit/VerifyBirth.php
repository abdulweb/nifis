<?php

namespace Modules\Birth\Services\Register\Validation\ValidInit;

trait VerifyBirth

{
    
	public function nextBirthAuth()
	{

        $date = [];
     
        foreach($this->mother->births as $birth){
            $date[] = $birth->data;
        }

        if(strtotime($this->data['date']) - last($date) < 15778476){

        	$this->error[] = "Birth authentication fails depending of the registered previous birth father and mother are too early to give another birth";
        }

	}

	public function firstBirthAuth()
	{
        if(strtotime($this->data['date']) - $this->status->wife[0]->marriages[0]->date < 15778476){
            $this->error[] = "Birth authentication fails depending of the marriage registration date and birth registration date husband and wife are too early to give birth";
        }

        if(strtotime($this->data['date']) > time()){
            $this->error[] = "Birth authentication fails you are using the date ahead of today you must use todays date or prviouse date ";
        }
	}

	public function parent()
	{
		$this->mother = $this->status->wife[0]->mother;
        $this->father = $this->status->wife[0]->marriages[0]->husband->father;

	}
}