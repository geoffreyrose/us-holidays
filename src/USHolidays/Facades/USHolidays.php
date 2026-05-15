<?php

namespace USHolidays\Facades;

use Illuminate\Support\Facades\Facade;

class USHolidays extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \USHolidays\USHolidays::class;
    }
}
