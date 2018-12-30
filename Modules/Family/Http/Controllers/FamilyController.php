<?php

namespace Modules\Family\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Routing\Controller;

use Modules\Family\Services\Family\RegisterFamily;

class FamilyController extends Controller
{
    use RegisterFamily;
}
