<?php

namespace App\Services\Register\Marriage;
use App\Services\Register\marriage\VerifyHusband;
use App\Services\Register\marriage\VerifyHusbandInWifeFamily;
use Illuminate\Http\Request;
class ValidHusband
{
    public function __construct($family,$w_family,$email,$h_name,$h_sname,$status,$date,$db)
    {
        if($status == 1){
            $wife = 'First Wife';
        }elseif($status == 2){
            $wife = 'First Wife';
        }elseif($status == 3){
            $wife = 'Third Wife';
        }else{
            $wife = 'Forth Wife'; 
        }
        $verify = new VerifyHusband();
        if(time() - $db < 473040000){
            request()->session()->flash('error',"Sorry $_name $h_lname it seems to be you are too early to have a family, family limit to 18 years and above");
        }
        if($date - $db < 473040000){
            request()->session()->flash('error',"Invalid Marriages date Please increase the marriage date");
        }  
        if(empty($w_family)){
            $family_id = $verify->get_family_id($family);
            $user_id = $verify->get_user_id($email);
            if($verify->is_admin($family_id,$user_id)){
                request()->session()->put('new_family',$family_id);
                if($verify->is_husband($family_id,$user_id)){
                    $husband_id = $verify->get_husband_id($user_id);
                    if($verify->status_exist($family_id,$status)){
                        request()->session()->put('error', "Sorry the $wife was already exist in $family family");
                    }
                    if($verify->can_marry($family_id,$husband_id)){
                        request()->session()->put('husband_user_id' ,$user_id);    
                    }else{
                        request()->session()->flash('error', "Sorry $h_name $h_sname has exceded the number wife he can marry in $family family");  
                    }
                }else{
                    request()->session()->put('husband_user_id' ,$user_id);
                }
            }elseif($verify->is_child($family_id,$user_id)){
                if($verify->has_family($user_id)){
                    $family_id = $verify->get_admin_family_id($user_id);
                    request()->session()->put('new_family',$family_id);
                    if($verify->is_husband($family_id,$user_id)){
                        $husband_id = $verify->get_husband_id($user_id);
                        if($verify->status_exist($family_id,$status)){
                            request()->session()->flash('error', "Sorry the $wife was already exist in $family family");
                        }
                        if($verify->can_marry($husband_id)){
                            request()->session()->put('husband_user_id' ,$user_id); 
                        }else{
                            request()->session()->flash('error', "Sorry $h_name $h_sname has exceded the number wife he can marry in $family family");
                        }
                    }
                }else{
                    if($verify->verify_age($user_id,$date)){
                        request()->session()->put('create_new_child_family' ,$user_id);
                        request()->session()->put('husband_user_id' ,$user_id);                        
                    }else{
                        request()->session()->flash('error', "Sorry $h_name $h_sname of $family family was too young to have a family");                        
                    }
                }
            }else{
                request()->session()->flash('error', "Invalid Email: $email in $family family");                
            }
            
        }else{
            new ValidHusbandInWifeFamily($w_family,$email);
            if(empty($family)){
                request()->session()->put('create_new_other_husband_family',1);
            }else{
                $family_id = $verify->get_family_id($family);
                $user_id = $verify->get_user_id($email);
                if($verify->is_admin($family_id,$user_id)){
                    request()->session()->put('new_family',$family_id);
                    if($verify->is_husband($family_id,$user_id)){
                        $husband_id = $verify->get_husband_id($user_id);
                        if($verify->status_exist($family_id,$status)){
                            request()->session()->flash('error', "Sorry the $wife was already exist in $family family");
                        }
                        if($verify->can_marry($family_id,$husband_id)){
                            request()->session()->put('husband_user_id' ,$user_id);    
                        }else{
                            request()->session()->flash('error', "Sorry $h_name $h_sname has exceded the number wife he can marry in $family family");  
                        }
                    }else{
                        request()->session()->put('husband_user_id' ,$user_id);
                    }
                }elseif($verify->is_child($family_id,$user_id)){
                    if($verify->has_family($user_id)){
                        $family_id = $verify->get_admin_family_id($user_id);
                        request()->session()->put('new_family',$family_id);
                        if($verify->is_husband($family_id,$user_id)){
                            $husband_id = $verify->get_husband_id($user_id);
                            if($verify->status_exist($family_id,$status)){
                                request()->session()->flash('error', "Sorry the $wife was already exist in $family family");
                            }
                            if($verify->can_marry($husband_id)){
                                request()->session()->put('husband_user_id' ,$user_id); 
                            }else{
                                request()->session()->flash('error', "Sorry $h_name $h_sname has exceded the number wife he can marry in $family family");
                            }
                        }
                    }else{
                        if($verify->verify_age($user_id,$date)){
                            request()->session()->put('create_new_child_family' ,$user_id);
                            request()->session()->put('husband_user_id' ,$user_id);                        
                        }else{
                            request()->session()->flash('error', "Sorry $h_name $h_sname of $family family was too young to have a family");                        
                        }
                    }
                }else{
                    request()->session()->flash('error', "Invaid Email: $email in $family family");                
                }
            }
        }
    }
}