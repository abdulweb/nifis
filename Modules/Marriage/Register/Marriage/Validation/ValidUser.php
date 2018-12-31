<?php

namespace App\Services\Register\Marriage;
use App\Services\Register\marriage\VerifyWife;
use App\Services\Register\marriage\ValidWifeInHusbandFamily;
use Illuminate\Http\Request;
class ValidUser
{
    public function __construct($email,$name,$sname,$status,$date)
    {
        $verify = new VerifyWife();
        $account = $verify->new_user($name,$sname,$email,$date);
        if($status == "wife"){
            session(['wife_user_id'=>$account->id]); 
        }elseif($status == "husband"){
            session(['other_husband_user_id'=>$account->id]);
        }         
    }
}