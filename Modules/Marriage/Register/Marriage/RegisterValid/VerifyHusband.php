<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use App\User;

use Modules\Marriage\Entities\Wife;

class VerifyHusband
{
    public $error = [];

    public function married(User $user)
    {
        dd($user->profile()->get()->gender_id);
        if($user->profile()->husband()){
           return true; 
        }
    }

    public function canMarry(User $user)
    {
        
        if($user->profile()->data_of_birth >= 567648000){
            return true;
        }else{
            $this->error = ["marriage authentication fails too early to marry"];
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
            $this->error = ["family authentication fails can not marry more than 4 wives"];
        }
    }
    
    public function validBirth(User $user, $data)
    {
        if($user->profile()->child()->birth()->mother_id != Wife::where('status_id',$data['mstatus'])->get()->mother()->id){
            $this->error = ["husband birth authentication fails and his mother information"];
        }
    }

    public function husbandMarriageDateAuth(User $user)
    {
        if($this->data['mdate'] - $user->profile()->date_of_birth < 567648000){
            $this->error = ["Sorry the husband marriage date authentication fails there must be the interval of atleast 15 years between husband date of birth and marriage date"];
        }
    }
}