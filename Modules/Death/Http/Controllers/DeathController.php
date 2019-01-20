<?php

namespace Modules\Death\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Family\Services\Family\ValidFamilies;
use Modules\Family\Services\Family\ValidDeathNames;

class DeathController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function index(ValidFamilies $family, ValidDeathNames $names)
    {
   
        return view('death::index',['families' => $family->families, 'names' => $names->names]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function verify(Request $request)
    {
        session(['death'=>$request->all()]);
        return redirect('/death');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('death::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('death::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
