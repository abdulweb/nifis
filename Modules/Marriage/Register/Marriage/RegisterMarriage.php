<?php
namespace Modules\Marriage\Register\Marriage;

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
    public function store(MarriageFormRequest $request)
    {   
        return $request->all();
    }
}