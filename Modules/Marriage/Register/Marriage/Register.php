<?php
namespace  App\Services\Register\Marriage;

use App\Family;
use App\Wife;
use App\Husband;
use App\Married;
use App\User;
use App\UseFamily;

class Register
{
   
    public function create_wife($family,$w_family,$user,$status)
    {
        
            return Wife::firstOrCreate([
                'family_id'=>$family,
                'user_id'=> $user,
                'wife_status_id' => $status,
                'wife_family_id' => $w_family
            ]);
            
    }
    public function update_wife_account($user,$family)
    {
        if(User::where('id',$user)->update(['marrital_status_id'=>2,'family_id'=>$family])){
            return true;
        }
    }
    public function update_husband_account($user,$family)
    {
        if(User::where('id',$user)->update(['marrital_status_id'=>2,'family_id'=>$family])){
            return true;
        }
    }
    public function create_husband($family,$user)
    {
        return Husband::firstOrCreate([
            'family_id'=>$family,
            'user_id'=> $user,
        ]);    
    }

    public function create_marriage($husband_id,$wife_id,$date)
    {
        return Married::firstOrCreate([
            'husband_id'=>$husband_id,
            'wife_id'=> $wife_id,
            'date' => $date
        ]);
    }
    public function create_family_user($family,$user)
    {
        if(UseFamily::create([
            'family_id'=>$family,
            'user_id'=> $user,
        ]))
        return true;
    }
    
    public function get_user_id($email)
    {
        $query = User::where('email',$email)->get();
        if($query->isNotEmpty()){
            foreach($query as $result){
                return $result->id;
            }
        }
    }
    //wife family issues

    public function verify_wife($family,$email)
    {
        $family = Family::where('family_name',$family)->get();
        foreach($family as $families){
            $family_id = $families->id;
            $user = User::where('email',$email)->get();
            foreach($user as $User){
                $user_id = $User->id;
                if(Children::Where('family_id',$family_id)->where('user_id',$user_id)->isNotEmpty()){
                    return true;
                }
            }
        }
    }
    public function she_is_married($email)
    {
        if(User::where('email',$email)->where('marrital_status',1)->get()->isNotEmpty()){
            return true;
        }
    }
}