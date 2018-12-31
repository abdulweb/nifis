<?php

namespace App\Services\Register\Marriage;

use App\Children;
use App\Birth;
use App\Wife;
use App\Mother;
use App\Admin;
use App\Family;
use App\User;
use App\Husband;
use App\Married;
use App\OtherHusband;
class VerifyHusband
{
    
    public function get_husband_mother_id($family,$status)
    {
        $wife = Wife::where('wife_status_id',$status)->where('family_id',$family)->get();
        foreach($wife as $result){
            $wife_id = $result->id;
            $mother = Mother::where('wife_id',$wife_id)->get();
            foreach($mother as $results){
                return $results->id;
            }
        }
    }
    public function get_user_id($email)
    {
        foreach(User::where('email',$email)->get() as $result){
            return $result->id;
        }
    }
    public function get_husband_email($family,$status,$name,$sname)
    {
        $que = Birth::Where('mother_id',$this->get_mother_id($family,$status))->get();
        foreach($que as $birth){
            $child_id = $birth->child_id;
            foreach(Children::find($child_id)->get() as $result){
                $user_id = $result->user_id;
                $query = User::find($user_id)
                ->where('first_name',$name)
                ->where('last_name',$sname)
                ->get();
                foreach($query as $results){
                    return $results->email;
                }
            }
        }
    }
    public function get_mother_id($family,$status)
    {
        foreach(Wife::where('family_id',$family)->where('wife_status_id',$status)->get() as $wife){
            foreach(Mother::where('wife_id',$wife->id)->get() as $mother){
                return $mother->id;
            }
        }
    }
    public function get_husband_date($email)
    {
        foreach(User::where('email',$email)->get() as $user){
            return $user->date_of_birth;
        }
    }
    public function has_family($user_id)
    {
        if(Admin::where('user_id',$user_id)->get()->isEmpty()){
            return false;
        }else{
            return true;
        }
    }

    public function verify_age($user,$dates){
        $child = Children::where('user_id',$user)->get();
        foreach($child as $result){
            $child_id = $result->id;
            $birth = Birth::where('child_id',$child_id)->get();
            foreach($birth as $results){
                $date = $dates - $results->date;
                if($date >= 567648000){
                    return true;
                }
            }
        }
    }
    public function get_this_family_name($family)
    {
        return Family::find($family)->family_name;
    }


    public function get_admin_family_id($user_id)
    {
        $admin = Admin::where('user_id',$user_id)->get();
        foreach($admin as $admins){
            return $admins->family_id;
        }
    }
    public function valid_wife($family,$name,$sname,$status)
    {
        if(Wife::where('first_name',$name)
                ->where('last_name',$sname)
                ->where('wife_status_id',$status)
                ->where('family_id',$family)->get()
                ->isNotEmpty()){
                    return true;
                }
    }
    public function get_husband_id($user)
    {
        $hus = Husband::where('user_id',$user)->get();
        foreach($hus as $husband){
            return $husband->id;    
        }
    }
    
    public function get_father_email($family)
    {
        $q = Admin::where('family_id',$family)->get();
        foreach($q as $result){
            return $result->user->email;
        }
    }
    public function get_family_id($name)
    {
        $res = Family::where('family_name',$name)->get();
        foreach($res as $family){
            return $family->id;    
        }
    }
    
    public function is_husband($family,$user)
    {
        if(Husband::where('user_id',$user)->where('family_id',$family)->get()->isNotEmpty()){
            return true;
        }
    }
    
    public function is_child($family,$user)
    {
        if(Children::where('user_id',$user)->where('family_id',$family)->get()->isNotEmpty()){
            return true;
        }
    }
    public function is_admin($family,$user)
    {
        if(Admin::where('user_id',$user)->where('family_id',$family)->get()->isNotEmpty()){
            return true;
        }
    }
    public function status_exist($family,$status)
    {
        if(Wife::where('wife_status_id',$status)->where('family_id',$family)->get()->isNotEmpty()){
            return true;
        }
    }
    public function can_marry($family,$husband)
    {
        $counter = 0;
        foreach(Married::where('husband_id',$husband)->where('is_active',1)->get() as $marr){
            $counter++;
        } 
        if($counter < 4){
            return true;
        }
    }
    public function valid_mother($family,$mother_id,$name,$sname)
    {
        $que = Birth::Where('mother_id',$mother_id)->get();
        foreach($que as $birth){
            $child_id = $birth->child_id;
            $child = Children::where('first_name',$name)
            ->where('last_name',$sname)
            ->where('family_id',$family)->get();
            foreach($child as $children){
                if($children->id == $child_id){
                    session(['child_id'=>$children->id]);
                    return true;
                }
            }
        }
    }
}