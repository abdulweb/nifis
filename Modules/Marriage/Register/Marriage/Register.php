<?php

namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\RegisterEnd\RegisterThisMarriage;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidateRequest;

class Register

{

	use ValidateRequest, RegisterThisMarriage;

    public $data;

	public function __construct($data)
	{
		$this->data = $data;
	}

    public function register()
    {
        if($validate = $this->validateMarriageRequest($this->data) && empty($validate->h_error) && empty($validate->h_error)){
        	switch (session('register')->status) {
	        	case 'father':
	        		$this->registerMarriage($this->data);
	        		break;
	        	case 'son':
	        		//create family account then register marriage
	        		break;
	        	case 'daughter':
	        		//create family account for the husband then register the marriage
	        		break;
	        	default:
	        		session()->flash('message','Unknown marriage');
        	        return redirect('/marriage');
	        		break;
	        }
        }else{
        	session()->flash('error', array_collapse([$validate->h_error,$validate->w_error]));
        	return redirect('/marriage');
        } 
        
    }

    public function registerMarriage(RegisterThisMarriage $register){
        $register->register();
    }


}