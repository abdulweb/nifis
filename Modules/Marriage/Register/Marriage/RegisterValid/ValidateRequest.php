<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

use App\User;

trait ValidateRequest

{
	public $w_errors;

	public $h_errors;

    public function validateMarriageRequest($data){
    	$user = User::find(1);
        //i use 1 for testing later use $data['user_id']
        $husband = new ValidHusband($user,$data);
        $husband->validateHusband();
        //User::where('email',$data['wife_email'])->get()
        $wife = new ValidWife($user,$data);
        $wife->validateWife();
    	$this->h_errors = $husband->error;
        dd($h_errors);
    	$this->w_errors = $wife->error;

    }
}