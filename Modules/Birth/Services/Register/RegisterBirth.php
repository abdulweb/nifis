<?php

namespace Modules\Birth\Services\Register;

use Modules\Family\Services\Birth\birthCore;

trait RegisterBirth
{
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
        dd($request->all());
    }

    public function verify(Request $request)
    {
        session(['family' => $request->all()]);
        return redirect()->route('birth.index');
    }

}