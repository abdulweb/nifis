<?php

namespace Modules\Family\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Routing\Controller;

use Modules\Family\Services\Account\RegisterFamily;

use Modules\Family\Services\Account\NewFamily;

use Modules\Family\Http\Requests\FamilyFormRequest;

use Modules\Family\Events\NewFamilyEvent;

class FamilyController extends Controller
{
    use RegisterFamily;
}
