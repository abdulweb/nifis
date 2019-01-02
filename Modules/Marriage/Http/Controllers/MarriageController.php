<?php

namespace Modules\Marriage\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Marriage\Register\Marriage\RegisterMarriage;

class MarriageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    
    use RegisterMarriage;

}
