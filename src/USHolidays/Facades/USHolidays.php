<?php

namespace USHolidays\Facades;

class USHolidays extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \USHolidays\USHolidays::class;
    }
}
