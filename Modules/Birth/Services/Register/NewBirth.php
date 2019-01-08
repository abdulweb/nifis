<?php

namespace Modules\Birth\Services\Register;

use Modules\Services\RegValidateBirthRequestister\Validation\ValidateBirthRequest;

class NewBirth

{

	public $data;

	public function __construct($data)
	{
		$this->data = $data;
		
		$this->validateRequest();
	}

    public function validateRequest(ValidateBirthRequest $validate)
    {
        $validate->Validate();
    }
}
