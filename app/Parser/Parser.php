<?php

namespace App\Parser;

use Illuminate\Support\Facades\Facade;

class Parser extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'parser';
    }
}
