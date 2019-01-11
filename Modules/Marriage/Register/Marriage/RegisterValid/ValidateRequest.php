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
    	 
        $this->husbandUser = User::find($this->data['user_id']);
        $this->validateHusband();
        
        $this->wifeUser = User::where('email',$this->data['wife_email'])->get();
        $this->validateWife();
    }
}