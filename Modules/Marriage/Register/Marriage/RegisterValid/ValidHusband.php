<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyHusbandInWifeFamily;

use App\User;

class ValidHusband extends VerifyHusbandInWifeFamily
{
    public $user;

    public $data;

    public function __construct(User $user, $data)
    {

        $this->user = $user;

        $this->data = $data;

    }

    public function validateHusband()
    {
        if(filled($this->data['wife_email'])){

            if(filled($this->user->profile->husband)){
                $this->familyAuth($this->data);
                $this->husbandAuth($this->user,$this->data);
            }

        }
        if($this->married($this->user)){

            $this->canMarryAgain($this->user);

        }else if(filled($this->user->profile->child)){

            $this->canMarry($this->user);
            $this->validBirth($this->user,$this->data);

        }
        $this->husbandMarriageDateAuth($this->user);

    }
}