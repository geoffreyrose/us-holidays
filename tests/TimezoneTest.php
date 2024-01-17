<?php

namespace Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class TimezoneTest extends TestCase
{
    public function testIsHoliday()
    {
        $usHoliday = UsHoliday::create(2020, 07, 4, 0, 0, 0, 'America/New_York');
        $this->assertTrue($usHoliday->isHoliday());
        $this->assertEquals('Independence Day', $usHoliday->getHolidayName());

        $usHoliday = UsHoliday::create(2020, 07, 4, 23, 59, 59, 'America/New_York');
        $this->assertTrue($usHoliday->isHoliday());
        $this->assertEquals('Independence Day', $usHoliday->getHolidayName());
    }

    public function testGetHolidaysInYear()
    {
        $holidays = UsHoliday::create(2020, 07, 4, 0, 0, 0, 'America/New_York');
        $usHoliday = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($usHoliday->date->isHoliday());
        $this->assertEquals('Independence Day', $usHoliday->date->getHolidayName());

        $holidays = UsHoliday::create(2020, 07, 4, 23, 59, 59, 'America/New_York');
        $usHoliday = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($usHoliday->date->isHoliday());
        $this->assertEquals('Independence Day', $usHoliday->date->getHolidayName());
    }

    public function testGetHolidaysByYear()
    {
        $holidays = UsHoliday::create(2020, 01, 01, 0, 0, 0, 'America/New_York');
        $usHoliday = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $usHoliday->date
                ->isSameDay(Carbon::create(2020, 01, 01, 0, 0, 0))
        );

        $holidays = UsHoliday::create(2020, 12, 31, 23, 59, 59, 'America/New_York');
        $usHoliday = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $usHoliday->date
                ->isSameDay(Carbon::create(2020, 01, 01, 0, 0, 0))
        );
    }
}
