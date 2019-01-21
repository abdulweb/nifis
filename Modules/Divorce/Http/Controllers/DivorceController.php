<?php

namespace Modules\Divorce\Http\Controllers;

use Modules\Divorce\Http\Requests\DivorceFormRequest;
use Modules\Divorce\Services\Registration\ProcessWives;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

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
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('divorce::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(DivorceFormRequest $request)
    {
        dd($request->all());
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
