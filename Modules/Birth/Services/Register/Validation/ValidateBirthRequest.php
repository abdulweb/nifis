<?php

namespace Modules\Birth\Services\Register\Validation;

use Modules\Birth\Services\Register\Parent\ParentInit;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyBirth;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyMother;
use Modules\Birth\Services\Register\Validation\ValidInit\VerifyChild;

trait ValidateBirthRequest

{


	public $father;

	public $mother;
    
    public $error = [];

    use VerifyMother, VerifyBirth, VerifyChild, ParentInit;

	public function Validate(){

        $this->nameAuth();
        $this->parent();
        if($this->mother != null){
            $this->nextBirthAuth();
        }else{
        	$this->firstBirthAuth();
        }
        if($this->error == null){
		    $this->createUser();
        	$this->handleParent();
        	$this->handleChildProfile();
        }

	}
}