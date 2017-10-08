<?php

namespace GRGroup\GRSupport\Facades;

use GRGroup\GRSupport\Classes\Support as GRSupport;

class Support extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return GRSupport::class;
    }
}