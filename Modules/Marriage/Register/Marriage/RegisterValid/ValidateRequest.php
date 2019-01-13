<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidHusband;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidWife;

use App\User;

trait ValidateRequest

{
    public $error = [];

    public $husbandUser;

    public $wifeUser;

    use ValidWife, ValidHusband;

    public function validateMarriageRequest(){
       
    	if(session('register')['status']== 'father'){
            $this->husbandUser = User::find($this->data['user_id']);
        }else{
            $this->husbandUser = User::find($this->data['husband_first_name']);
        }

        $this->validateHusband();
        
        $this->wifeUser = User::where('email',$this->data['wife_email'])->get();
        $this->validateWife();
    }
}