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
        dd($this->user->profile());
        if(filled($this->data['wife_email'])){

            if($this->user->profile()->husband()){
                $this->familyAuth($this->data);
                $this->husbandAuth($this->user,$this->data);
            }

        }else if($this->married($this->user)){

            $this->canMarryAgain($this->user);

        }else if($this->user->profile()->child()){

            $this->canMarry($this->user);
            $this->validBirth($this->user,$this->data);

        }
        $this->husbandMarriageDateAuth($this->user);

    }
}