<?php

namespace Modules\Marriage\Register\Marriage\RegisterValid;

use Modules\Marriage\Register\Marriage\RegisterValid\VerifyHusband;
use App\User;

class VerifyWife extends VerifyHusband
{
    public function birthAuth(User $user)
    {
        if(fiiled($user->profile()->child()->birth())){
            return true;
        }eles{
            $this->error = ["Sorry the wife birth authentication fails base on the specify email no birth"];
        }
    }

    public function marriageAuth(User $user)
    {

        if($user->profile()->date_of_birth < 378432000){
            $this->error = ["Sorry the wife marriage authentication fails the owner of this email was too young to marry"];
        }else if($user->profile()->wife()->marriage()->is_active != 0){
            $this->error = ["Sorry the wife marriage authentication fails the owner of this email was already married"];
        }
    }

    public function genderAuth(User $user)
    {
        if(filled($user->profile()->wife())){
            $this->error = ["Sorry the wife gender authentication fails this email is belongs to male"];
        }
    }

    public function wifeMarriageDateAuth()
    {
        if($this->data['mdate'] - $this->data['wdate'] < 378432000){
            $this->error = ["Sorry the wife marriage date authentication fails there must be the interval of atleast 12 years between wife date of birth and marriage date"];
        }
    }
}