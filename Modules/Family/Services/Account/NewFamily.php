<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Services\Account\Family;

use Modules\Family\Services\Account\Validate;

class NewFamily 
{
    use Validate;

	public $data;

    public $registerer;

    use Family;

    public function __construct($data)
    {
        $this->data = $data;
        $this->registerer = Auth()->User();
        $this->validateFamilyRequest(); 
        $this->error == null ? $this->registerFamily() : session()->flash('error',$this->error);
    }

}