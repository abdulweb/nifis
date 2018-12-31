<?php
namespace App\Services\Register\Marriage;
use Illuminate\Http\Request;
use App\Services\Register\Marriage\RegisteredMarriage;
use App\Services\Register\Family\RegisterChildFamily;
use App\Services\Register\Family\RegisterOtherHusbandFamily;
use App\Services\Register\Marriage\ValidHusband;
use App\Services\Register\Marriage\ValidWife;
use App\Services\Register\Marriage\ValidUser;
use App\Services\Register\Address\HouseAddress;
use App\Services\Register\FamilyEvent\Announce\RegisterAnnounce as NotifyFamily;
use App\Family;
use App\OtherWife;
use App\User;
use App\Users;
use App\LivesIn;
use App\Husband;
use App\Wife;
use App\Married;
Use App\Admin;
Use App\Children;
use App\WifeStatus;
trait RegisterMarriage
{
    protected $family_children;

    public function index()
    {
        $status = WifeStatus::all();
        $families =Family::all();
        $family = new Family;
        $family_id = $family->get_family_id(session('family_id'));
        
        if(session('reg_status') == 'father'){
            foreach(Admin::where('family_id',$family_id)->get() as $admin){
                if(User::where('id',$admin->user_id)->where('life_status_id',1)->get()->isNotEmpty()){
                    $admins = Admin::where('family_id',$family_id)->get();
                }
            }
            
        }elseif(session('reg_status') == 'son'){
            $valid_child = [];
            foreach(Children::where('family_id',$family_id)->where('gender_id',1)->get() as $child){
                if(User::where('id',$child->user_id)->where('life_status_id',1)->get()->isNotEmpty()){
                    if(Admin::where('user_id',$child->user_id)->get()->isEmpty()){
                        $valid_child[] = Children::where('user_id',$child->user_id)->get();
                    }
                }
            }
            $admins = $valid_child;
        }else{
            $valid_child = [];
            foreach(Children::where('family_id',$family_id)->where('gender_id',2)->get() as $child){
                if(User::where('id',$child->user_id)->where('life_status_id',1)->get()->isNotEmpty()){
                    if(OtherWife::where('user_id',$child->user_id)->get()->isEmpty()){
                        $valid_child[] = Children::where('user_id',$child->user_id)->get();
                    }else{
                        foreach(OtherWife::where('user_id',$child->user_id)->get() as $wife){
                            if(Married::where('other_wife_id',$wife->id)->where('is_active',0)->get()->isNotEmpty()){
                                $valid_child[] = Children::where('user_id',$child->user_id)->get();
                            }
                        }
                    }
                }
            }
            $admins = $valid_child;
        }
        if(!isset($admins)){
            $admins = [];
        }
        
        if(session('reg_status') == 'son'){
            $stage ='Husband';
        }elseif(session('reg_status') == 'daughter'){
            $stage = 'Wife';
        }else{
            $stage = 'Father';
        }
        $wife = Family::find($family_id)->wife;
        $status = WifeStatus::all();
        return view('register.new_marriage',compact('admins','families','status','stage','wife','status'));
    }
    public function store(Request $request)
    {
        $family = new Family();
        if($this->validator($request->all())->validate()){
            $create_address = new HouseAddress($request->country,$request->state,$request->lga,$request->town,$request->area,$request->house_no,$request->house_desc);
            $address_id = session('address_id');
            $reg_status = session('reg_status');
            $this_family = session('family_id');
            $family_id = $family->get_family_id(session('family_id'));
            if($reg_status == 'father'){
                $husband = new VerifyHusband();
                $email = $husband->get_father_email($family_id);
                $date = $husband->get_husband_date($email);
                new ValidHusband(session('family_id'),$request->w_family_name,$email,$request->h_fname,$request->h_lname,$request->w_status,strtotime($request->date),$date); 
                new ValidWife(session('family_id'),$request->w_family_name,$request->email,$request->w_fname,$request->w_lname,$request->w_status,strtotime($request->date),strtotime($request->w_date_of_birth));
                if(session('error') == null){
                    new ValidUser($request->email,$request->w_fname,$request->w_lname,'wife',strtotime($request->date_of_birth));
                    if(empty($request->w_family_name)){
                        new RegisterThisMarriage($family_id,'0',session('husband_user_id'),session('wife_user_id'),$request->w_status,$request->email,strtotime($request->date),$address_id);
                    }else{
                        new RegisterThisMarriage(session('new_family'),'0',session('husband_user_id'),session('wife_user_id'),$request->w_status,$request->email,strtotime($request->date),$address_id);
                    }
                    $request->session()->flash('message', "Congratulation the marriage of $request->h_fname $request->h_lname and $request->w_fname $request->w_lname was cuccessfully registered in $this_family family");                    
                    new NotifyFamily("Hi i have registered the $request->h_fname $request->h_lname and $request->w_fname $request->w_lname as husband and wife in $this_family family",1);

                    return redirect()->route('verify_marriage.index');
                }else{
                    return redirect()->route('marriage.index');
                }
            }elseif($reg_status == 'son'){
                $husband = new VerifyHusband();
                $email = $husband->get_husband_email($family_id,$request->m_status,$request->h_fname,$request->h_lname);
                $date = $husband->get_husband_date($email);
                new ValidHusband(session('family_id'),$request->w_family_name,$email,$request->h_fname,$request->h_lname,$request->w_status,strtotime($request->date),$date); 
                new ValidWife(session('family_id'),$request->w_family_name,$request->email,$request->w_fname,$request->w_lname,$request->status,strtotime($request->date),strtotime($request->w_date_of_birth));
                if(session('error') == null){
                    new ValidUser($request->email,$request->w_fname,$request->w_lname,'wife',strtotime($request->date_of_birth));
                    if(empty($request->w_family_name)){
                        if(session('create_new_child_family')){
                            $my_family = $request->h_fname.'000'.session('husband_user_id');
                            new RegisterChildFamily($request->h_fname,$request->h_lname,$family_id,$my_family,'Small',session('husband_user_id'));
                            new RegisterThisMarriage(session('new_family'),'0',session('husband_user_id'),session('wife_user_id'),$request->w_status,$request->email,strtotime($request->date),$address_id);
                            $request->session()->flash('message', "Congratulation the marriage of $request->h_fname $request->h_lname and $request->w_fname $request->w_lname was successfully registered and new family account was created under your father family as  $my_family but it can be updated  by this husband family");
                            new NotifyFamily("Hi i have create new family account and registered $request->h_fname $request->h_lname and $request->w_fname $request->w_lname as husband and wife in $my_family family",1);
                            return redirect()->route('verify_marriage.index'); 
                        }
                    }else{
                        if(session('create_new_child_family')){
                            $my_family = $request->h_fname.'000'.session('husband_user_id');
                            new RegisterChildFamily($my_family,'Small',session('husband_user_id'));
                            new RegisterThisMarriage(session('new_family'),session('wife_family'),session('husband_user_id'),session('wife_user_id'),$request->w_status,$email,strtotime($request->date),$address_id);
                            $request->session()->flash('message', "Congratulation the marriage of $request->h_fname $request->h_lname and $request->w_fname $request->w_lname was successfully registered and new family account was created under your father family as  $my_family but it can be updated  by this husband family");
                            new NotifyFamily("Hi i have created new family account and registered $request->h_fname $request->h_lname as the child of $request->father_first_name $request->father_last_name and $request->w_fname $request->w_lname as husband and wife in $my_family family",1);                            
                            return redirect()->route('verify_marriage.index'); 
                        }
                    }
                }else{
                    return redirect()->route('marriage.index');
                }
            }else{
                $wife_data = new VerifyWife();
                $wife_email = $wife_data->get_wife_email($family_id,$request->m_status,
                $request->w_fname,$request->w_lname);
                $date = $wife_data->get_wife_date($wife_email);
                $wife_family =  session('family_id');
                new ValidHusband($request->family_name,$wife_family,$request->email,$request->h_fname,$request->h_lname,$request->w_status,strtotime($request->date),strtotime($request->h_date_of_birth)); 
                new ValidWife($request->family_name,$wife_family,$wife_email,$request->w_fname,$request->w_lname,$request->status,strtotime($request->date),$date);
                if(session('error') == null){
                    new ValidUser($request->email,$request->h_fname,$request->h_lname,'husband',strtotime($request->date_of_birth));
                    if(session('create_new_other_husband_family')){
                        $my_family = $request->h_fname.'000'.session('other_husband_user_id');
                        new RegisterOtherHusbandFamily($my_family,'Small',session('other_husband_user_id'));
                        new RegisterThisMarriage(session('new_family'),$family_id,session('other_husband_user_id'),session('wife_user_id'),$request->w_status,$request->email,strtotime($request->date),$address_id); 
                         
                    }elseif(session('create_new_child_family')){
                        $my_family = $request->h_fname.'000'.session('husband_user_id');
                        new RegisterChildFamily($my_family,session('husband_user_id'));
                        new RegisterThisMarriage(session('new_family'),session('wife_user_id'),session('wife_user_id'),$request->email,strtotime($request->date),$address_id);
                          
                    }else{
                        new RegisterThisMarriage(session('new_family'),$family_id,session('husband_user_id'),session('wife_user_id'),$request->w_status,$request->email,strtotime($request->date),$address_id);
                          
                    }
                    new NotifyFamily("Hi i have created new family account and registered $request->h_fname $request->h_lname as the child of $request->father_first_name $request->father_last_name and $request->w_fname $request->w_lname as husband and wife in $my_family family",1);                                                
                    $request->session()->flash('message', "Congratulation the marriage of $request->h_fname $request->h_lname and $request->w_fname $request->w_lname was cuccessfully register in $request->family_name family");   
                    return redirect()->route('verify_marriage.index');                
                }else{
                    return redirect()->route('marriage.index');
                }
            }
        }else{
            $request->session()->flash('error', "Supply an invalid data");
            return redirect()->route('marriage.index');
        }
    }
}