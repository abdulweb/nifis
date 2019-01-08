<?php

namespace Modules\Services\Register\Validation;

use Modules\Services\Register\Parent\ParentInit;
use Modules\Services\Register\Validation\VerifyBirth;
use Modules\Services\Register\Parent\VerifyMother;

trait ValidateBirthRequest

{

	public $status;

	public $father;

	public $mother;
    
    public $error = []

    use VerifyMother, VerifyBirth, ParentInit;

	public function Validate(){

        $this->nameAuth();
        $this->parent();
        if($this->mother != null){
            $this->nextBirthAuth();
        }else{
        	$this->firstBirthAuth();
        }
        if($this->error == null){
        	$this->handleParent();
        }

	}
}