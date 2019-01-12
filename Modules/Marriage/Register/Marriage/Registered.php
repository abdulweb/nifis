<?php

namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\RegisterEnd\RegisterThisMarriage;

use Modules\Marriage\Register\Marriage\RegisterValid\ValidateRequest;

class Registered

{

	use ValidateRequest, RegisterThisMarriage;

    public $data;

	public function __construct($data)
	{
		$this->data = $data;
		$this->data = $this->prepareData($data);
		dd($this->data);
	}

    public function registered()
    {
    	$validate = $this->validateMarriageRequest();

        if(empty($this->error)){
         
        	switch (session('register')['status']) {
	        	case 'father':
	        		$this->registerMarriage();
	        		break;
	        	case 'son':
	        		//create family account then register marriage
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

        	return redirect('/marriage');
        } 
        
    }

    public function registerMarriage(){
        $this->register();
    }


}