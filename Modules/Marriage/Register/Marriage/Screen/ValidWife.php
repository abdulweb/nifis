<?php

namespace App\Services\Register\Marriage;
use App\Services\Register\Marriage\VerifyWife;
use App\Services\Register\Marriage\ValidWifeInHusbandFamily;
use Illuminate\Http\Request;
class ValidWife
{
    public function __construct($h_family,$family,$email,$name,$sname,$status,$date,$db)
    {
        $verify = new VerifyWife();
        if(time() - $db < 378432000){
            request()->session()->flash('error',"Sorry $name $sname it seems to be you are too early marry, marriage is limit to 12 years and above");
        }
        if($date - $db < 378432000){
            request()->session()->flash('error',"Invalid Marriage date Please ask for a correct marriage date");
        }
        if(empty($family)){
            new ValidWifeInHusbandFamily($h_family,$email,$status);  
        }else{
            new ValidWifeInHusbandFamily($h_family,$email,$status);
            if($verify->verify_wife($family,$email)){
                if($verify->verify_age($verify->get_wife_user_id($email),$date)){
                session(['wife_user_id'=>$verify->get_wife_user_id($email)]);
                session(['wife_family'=>$verify->get_family_id($family)]);
                }else{
                    request()->session()->flash('error', "Sorry $name $sname of $family family was too young to marry"); 
                }
            }else{
                request()->session()->flash('error', "Sorry invalid wife family $family or wife email $email"); 
            }
        }
    }
}