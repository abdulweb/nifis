<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

trait ValidateRequest

{
	public $w_errors;

	public $h_errors;

    public function validateMarriageRequest($this->data){

        $husband = new ValidHusband(User::find($this->data['user_id']),$this->data);

        $wife = new ValidWife(User::where('email',$this->data['wife_email'])->get(),$this->data);

    	$this->h_errors = $husband->error;

    	$this->w_errors = $wife->error;

    }
}