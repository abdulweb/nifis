<?php

namespace Modules\Divorce\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Divorce\Http\Requests\DivorceFormRequest;
use Modules\Divorce\Services\Registration\ProcessWives;
use Modules\Divorce\Services\Registration\DivorceWife;

class DivorceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(ProcessWives $wives)
    {
        return view('divorce::index',['wives'=>$wives->validWives]);
    }

    

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DivorceFormRequest $request)
    {
        $divorce = new DivorceWife($request->all());
        if(empty($divorce->error)){
            broadcast(new NewDivorceEvent($divorce));
        }
        return redirect('/divorce');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('divorce::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('divorce::edit');
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
