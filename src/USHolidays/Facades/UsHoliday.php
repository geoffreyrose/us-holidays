<?php

namespace USHolidays\Facades;

class UsHoliday extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \USHolidays\UsHoliday::class;
    }
}
