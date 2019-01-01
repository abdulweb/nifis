<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

trait ValidateRequest

{
	public $w_errors;

	public $h_errors;

    public function validateMarriageRequest($data){

        $husband = new ValidHusband(User::find($data['user_id']),$data);

        $wife = new ValidWife(User::where('email',$data['wife_email'])->get(),$data);

    	$this->h_errors = $husband->error;

    	$this->w_errors = $wife->error;

    }
}