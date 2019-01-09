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

        if(strtotime($this->data['data']) - last($data) < 15778476){

        	$this->error[] = "Birth authentication fails depending of the registered previous birth father and mother are too early to give another birth";
        }

	}

	public function firstBirthAuth()
	{
        if(strtotime($this->data['date']) - $this->status->wife[0]->marriage->date < 15778476){
            $this->error[] = "Birth authentication fails depending of the marriage registration date husband and wife are too early to give birth";
        }
	}

	public function parent()
	{

		$this->mother = $this->status->wife[0]->mother;

        $this->father = $this->status->wife[0]->marriage->husband->father;

	}
}