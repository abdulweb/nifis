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
	        		break;
	        	case 'son':
	        		//create family account then register marriage
                    $this->registerFamily();
                    $this->registerMarriage();
	        		break;
	        	case 'daughter':
	        		//create family account for the husband then register the marriage
	        		break;
	        	default:
	        		session()->flash('message','Unknown marriage');
	        		break;
	        }

        }else{
        	
        	session()->flash('error', $this->error);
        } 
        
    }

    public function registerMarriage(){

        $this->register();
    }


}