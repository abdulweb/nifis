<?php

namespace App\Services\Register\Marriage;
use App\Services\Register\marriage\VerifyHusband;
use Illuminate\Http\Request;
class ValidHusbandInWifeFamily
{
    public function __construct($family,$email)
    {
        $verify = new VerifyHusband();
        $family_id = $verify->get_family_id($family);
        $user_id = $verify->get_user_id($email);
        // if($verify->is_other_husband($family_id,$user_id)){
        //     request()->session()->flash('error', "Sorry you have already married in $family ");
        // }
    }
}