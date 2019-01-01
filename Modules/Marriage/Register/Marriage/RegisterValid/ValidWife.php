<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyWife;

class ValidWife extends VerifyWife
{

    public $user;

    public $data;

    public function __construct(User $user, $data)
    {
        $this->data = $data;
        $this->user = $user;
    }

    public function validateWife()
    {
        
        if($this->data['wfamily']){
            $this->birthAuth($this->user);
            $this->marriageAuth($this->user);
            $this->genderAuth($this->user);
        }
        $this->wifeMarriageDateAuth($this->data);

    }
}