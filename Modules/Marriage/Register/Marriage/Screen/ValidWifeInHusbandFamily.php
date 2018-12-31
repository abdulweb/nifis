<?php

namespace App\Services\Register\Marriage;
use App\Services\Register\marriage\VerifyWife;
use Illuminate\Http\Request;
class ValidWifeInHusbandFamily
{
    public function __construct($family,$email,$status)
    {
        $request = new Request();
        $verify = new VerifyWife();
        $family_id = $verify->get_family_id($family);
        $user_id = $verify->get_wife_user_id($email);
        if($verify->is_wife($family_id,$user_id)){
            request()->session()->flash('error', "Sorry this marriage was already registered in $family family");
        }
        
    }
}