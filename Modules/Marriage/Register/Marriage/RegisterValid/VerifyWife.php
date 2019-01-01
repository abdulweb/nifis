<?php

namespace App\Services\Register\Marriage;

use App\Children;
use App\Birth;
use App\Wife;
use App\Mother;
use App\Admin;
use App\Family;
use App\User;
use Illuminate\Support\Facades\Hash;
class VerifyWife
{
    
    public function verify_wife($family,$email)
    {
        $family = Family::where('family_name',$family)->get();
        foreach($family as $families){
            $family_id = $families->id;
            $user = User::where('email',$email)->get();
            foreach($user as $User){
                $user_id = $User->id;
                if(Children::Where('family_id',$family_id)->where('user_id',$user_id)->get()->isNotEmpty()){
                    return true;
                }
            }
        }
    }
    public function status_exist($family,$status)
    {
        if(Wife::where('wife_status_id',$status)->where('family_id',$family)->get()->isNotEmpty()){
            return true;
        }
    }


    public function get_wife_date($email)
    {
        foreach(User::where('email',$email)->get() as $user){
            foreach(Children::where('user_id',$user->id)->get() as $child){
                foreach(Birth::where('child_id',$child->id)->get() as $birth){
                    return $birth->date;
                }
            }
        }
    }

    public function get_mother_id($family,$status)
    {
        foreach(Wife::where('wife_status_id',$status)->where('family_id',$family)->get() as $result){
            foreach(Mother::where('wife_id',$result->id)->get() as $results){
                return $results->id;
            }
        }
        
    }
    public function verify_age($user,$dates){
        foreach(Children::where('user_id',$user)->get() as $result){
            foreach(Birth::where('child_id',$result->id)->get() as $results){
                $date = $dates - $results->date;
                if($date < 378432000){
                    return true;
                }
            }
        }
    }
    
    public function get_wife_user_id($email)
    {
        foreach(User::where('email',$email)->get() as $result){
            return $result->id;
        }
    }
    public function get_family_id($name)
    {
        foreach(Family::where('family_name',$name)->get() as $result){
            return $result->id;
        }
    }
    public function is_wife($family,$wife){
        if(Wife::where('family_id',$family)->where('user_id',$wife)->get()->isNotEmpty()){
            return true;
        }
    }
    public function new_user($name,$sname,$email,$date)
    {
        if(User::where('email',$email)->get()->isEmpty()){
            return User::create([
            'first_name' =>$name,
            'last_name'=>$sname,
            'email'=>$email,
            'date_of_birth'=>$date,
            'password'=>Hash::make('123456')]);
        }else{
            foreach(User::where('email',$email)->get() as $user){
                return $user;
            }
        }
    }









    public function get_wife_mother_id($family,$status)
    {
        foreach(Wife::where('wife_status_id',$status)->where('family_id',$family)->get() as $result){
            foreach(Mother::where('wife_id',$result->id)->get() as $results){
                return $results->id;
            }
        }
       
    }
    
    
    
    public function valid_wife($family,$status)
    {
        if(Wife::where('wife_status_id',$status)
                ->where('family_id',$family)->get()
                ->isNotEmpty()){
                    return true;
                }
    }
    public function get_wife_child_user_id($child)
    {
        $child = Children::find($child)->get();
        foreach($child as $children){
            return $children->user_id;    
        }
    }
    
    public function get_wife_email($family,$status,$name,$sname)
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
    public function valid_mother($family,$mother_id)
    {
        $que = Birth::Where('mother_id',$mother_id)->get();
        foreach($que as $birth){
            $child_id = $birth->child_id;
            
            $child = Children::where('family_id',$family)->get();
            foreach($child as $children){
                if($children->id == $child_id){
                    session(['child_id'=>$children->id]);
                    return true;
                }
            }
        }
    }
}