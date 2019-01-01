<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

class ValidateRequest

{
	public $w_errors;

	public $h_errors;

    public function __consruct(ValidHusband $husband, ValidWife $wife, $data){
    	$this->h_errors = $husband->validateHusband($data);
    	$this->w_errors = $wife->validatWife($data);
    }


}