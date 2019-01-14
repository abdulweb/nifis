<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyHusbandInWifeFamily;

use App\User;

trait ValidHusband 
{
    use VerifyHusbandInWifeFamily;

    public function validateHusband()
    {

        if(filled($this->husbandUser->profile->husband)){
            $this->familyAuth();
            $this->husbandAuth($this->husbandUser);
        }
     
        if(!empty($this->husbandUser)){

            if($this->married($this->husbandUser)){
                $this->canMarryAgain($this->husbandUser);
            }

        }else if(!empty($this->husbandUser->profile->child)){

            $this->canMarry($this->husbandUser);
            $this->validBirth($this->husbandUser);

        }
        //$this->emailAuth();
        if(empty($this->husbandUser)){
            $this->husbandMarriageDateAuth($this->husbandUser);
        }

    }
}