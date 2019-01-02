<?php

namespace Modules\Family\Services\Account;

use Modules\Family\Http\Requests\FamilyFormRequest;
use Modules\Family\Services\Account\NewFamily;
use Modules\Family\Events\NewFamilyEvent;

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
    public function store(FamilyFormRequest $request, NewFamily $newfamily)
    {
        try {
            $newfamily->register($request->all());
            broadcast(new NewFamilyEvent($newfamily->family))->toOthers();
            return redirect()->route('family.create')->with('message','Family account crated successfully');
        } catch (\Exception $exception) {
            return back()->withInput()
                ->withErrors(['error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}

