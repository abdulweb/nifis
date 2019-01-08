<?php

namespace Modules\Birth\Services\Register;

use Modules\Family\Services\Birth\birthCore;

use Modules\Birth\Services\Register\Validation\ValidateBirthRequest as ValidateRequest;

use Modules\Birth\Services\Register\NewBirth;

trait RegisterBirth
{
	use ValidateRequest;

	public function index(birthCore $birth)
    {
        return view('birth::Birth.new_birth',['father'=>$birth->father,'mothers'=>$birth->mothers,'families'=>$birth->families]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('birth::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        try {
            $birth = new NewBirth($request->all());
            dd($birth->data);
            broadcast(new NewBirthEvent($birth->data))->toOthers();
            return redirect()->route('birth.index')->with('message','Birth is registered successfully');
        } catch (\Exception $exception) {
            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request!']);
        }

    }

    public function verify(Request $request)
    {
        session(['family' => $request->all()]);
        return redirect()->route('birth.index');
    }

}