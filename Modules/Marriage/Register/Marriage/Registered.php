<?php

namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\RegisterEnd\RegisterThisMarriage;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidateRequest;

use Modules\Family\Services\Account\Family as NewChildFamily;

class Registered

{

	use ValidateRequest, RegisterThisMarriage, NewChildFamily;

    public $data;
    

	public function __construct($data)
	{
		$this->data = $data;
		$this->data = $this->prepareData($data);
		$this->registeredNewMarriage();
	}
      
    public function registeredNewMarriage()
    {

    	$validate = $this->validateMarriageRequest();
       
        if(empty($this->error)){
         
        	switch (session('register')['status']) {
	        	case 'father':
	        		$this->registerMarriage();
	        		$message = "Congratulation your Marriage was register successfully";
	        		break;
	        	case 'son':
	        		//create family account then register marriage
                    $this->registerFamily();
                    $this->registerMarriage();
                    $message = 'Congratulation the child marriage was register successfully he now has the family account which is part of your family';
	        		break;
	        	case 'daughter':
	        		//create family account for the husband then register the marriage
	        		break;
	        	default:
	        		session()->flash('message','Unknown marriage');
	        		break;
	        }
	        session()->flash('message', $message);

        }else{
        	
        	session()->flash('error', $this->error);
        } 
        
    }

    public function registerMarriage(){

        $this->register();
    }


}