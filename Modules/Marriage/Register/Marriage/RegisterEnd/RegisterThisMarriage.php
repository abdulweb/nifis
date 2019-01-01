<?php

namespace Modules\Marriage\Register\Marriage\RegisterEnd;

use Modules\Marriage\Register\Marriage\RegisterEnd\MarriageInitiate;

class RegisterThisMarriage extends  MarriageInitiate
{
    public function register()
    {
        $this->handle();
        $this->createHusband()namespace Modules\Marriage\Register\Marriage\RegisterEnd;
    }
}