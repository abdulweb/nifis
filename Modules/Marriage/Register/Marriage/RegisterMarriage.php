<?php
namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\Register;

use Modules\Family\Entities\Family;

use Illuminate\Http\Request;

use Modules\Marriage\Events\NewMarriageEvent;

use Modules\Marriage\Http\Requests\MarriageFormRequest;

trait RegisterMarriage
{
    public function index()
    {
        $husbands = [];
        $wives = [];
        $families = [];
        $family = [];
        if(session('register')){
            $family = Family::find(session('register')['family']);
            $admin = $family->admin;
            switch (session('register')['status']) {
                case 'father':
                    $husbands = [
                        'name'=>$family->admin->profile->user->first_name,
                        'surname'=>$family->admin->profile->user->last_name,
                        'user_id' => $family->admin->profile->user->id
                    ];
                    break;
                case 'son':
                    foreach($admin->profile->husband->father->births->child->user as $child){
                        if($child->profile->gender_id == 1 && $child->profile->marital_status_id == 1){
                            $husbands = [
                            'name'=>$child->first_name,
                            'surname'=>$child->last_name,
                            'user_id' => $child->id
                            ];
                        }
                    }
                    break;
                
                case 'daughter':
                    foreach($admin->profile->husband->father->births->child->user as $child){
                        if($child->profile->gender_id == 2 && $child->profile->marital_status_id == 1){
                            $wives = [
                            'name'=>$child->first_name,
                            'surname'=>$child->last_name,
                            'user_id' => $child->id
                            ];
                        }
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }else{
            $families = Family::all();
        }
        return view('marriage::Marriage.new_marriage',['family'=>$family,'families'=>$families,'husbands'=>$husbands,'wives'=>$wives]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    
    public function create()
    {
        
        return view('marriage::Marriage.new_marriage',['family'=>$families]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $marriage = new Registered($request->all()); 
        if($marriage->register() && session('error') == null){
            broadcast(new NewMarriageEvent($marriage))->toOthers();
            session()->forget('register');
        }
        return redirect()->route('marriage.index');
    }

    public function verify(Request $request)
    {
        session(['register'=>$request->all()]);
        return redirect('/marriage');
    }
}