<?php

// src/DemoFacade.php

namespace track_referrer\Demo;

use Illuminate\Support\Facades\Facade;

class DemoFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'track_referrer_demo';
    }
}
