<?php
namespace Modules\Marriage\Register\Marriage;

use Modules\Marriage\Register\Marriage\Register;

use Illuminate\Http\Request;

use Modules\Marriage\Events\NewMarriageEvent;

use Modules\Marriage\Http\Requests\MarriageFormRequest;

trait RegisterMarriage
{
      public function index()
    {
        return view('marriage::Marriage.new_marriage');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    
    public function create()
    {
        return view('marriage::Marriage.new_marriage');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {   $marriage = new Register($request->all()); 
        if($marriage->register() && session('error') == null){

            broadcast(new NewMarriageEvent($request))->toOthers();

            return redirect()->route('marriage.index')->with('message','Marriage was successfully registered');

        }
    }

    public function verify(Request $request)
    {
        session(['register'=>$request->all()]);
        return redirect('/marriage');
    }
}