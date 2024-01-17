<?php

namespace USHolidays\Facades;

class UsHolidays extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \USHolidays\UsHoliday::class;
    }
}
