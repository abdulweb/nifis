<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use App\User;

use Modules\Marriage\Entities\Wife;

class VerifyHusband
{
    public $error[];

    public function hasFamily(User $user)
    {
        if(filled($user->profile()->admin())){
           return true; 
        }
    }

    public function canMarry(User $user)
    {
        
        if($user->profile()->data_of_birth >= 567648000){
            return true;
        }else{
            $this->error = ["$user->first_name $user->last_name was too early to marry"];
        }
    }

    public function canMarryAgain(User $user)
    {
        $wife = 0;
        foreach($user->profile()->husband()->marriages() as $marriage){
            $wife++;
        }
        if($wife < 4){
            return true;
        }else{
            $this->error = ["$user->first_name $user->last_name you can not marry more than 4 wives"];
        }
    }
    
    public function validBirth(User $user, $data)
    {
        if($user->profile()->child()->birth()->mother_id != Wife::where('status_id',$data['mstatus'])->get()->mother()->id){
            $this->error = ["Invalid husband and his mother information"];
        }
    }
}