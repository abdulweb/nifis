<?php
namespace Modules\Family\Services\Family;

use Modules\Family\Services\Family\CreateFamily;
use Modules\Family\Http\Requests\FamilyFormRequest
trait RegisterFamily
{
    public function index()
    {
        return view('family::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('family::Family.create');
    }
    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FamilyRequest $request, CreateFamily $newfamily)
    {
        if($newfamily->register($request->all())){
        	broadcast(new NewFamilyEvent($newfamily->family))->toOthers();
        	return redirect()->route('home')->with('message','Family account crated successfully');
        }else{
        	return redirect()->route('family.create')->with('error','problem has occure in creating this family account');
        }
    }
}

