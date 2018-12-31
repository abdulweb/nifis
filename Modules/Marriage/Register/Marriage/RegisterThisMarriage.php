<?php

namespace App\Services\Register\Marriage;

use App\Services\Register\Marriage\Register;
use App\Services\Register\Marriage\Lives\LivesFamily;
class RegisterThisMarriage
{
    public function __construct($family_id,$w_family,$husband_user_id,$w_user_id,$w_status,$email,$date,$address_id)
    {
        $marriage = new Register();
        $wife = $marriage->create_wife($family_id,$w_family,$w_user_id,$w_status);
        $husband = $marriage->create_husband($family_id,$husband_user_id);
        $marriage->create_marriage($husband->id,$wife->id,$date);
        new LivesFamily($family_id,$w_user_id,$address_id);
        new LivesFamily($family_id,$husband_user_id,$address_id); 
        $marriage->update_husband_account($husband_user_id,$family_id); 
        $marriage->update_wife_account($w_user_id,$family_id);
        
    }
}