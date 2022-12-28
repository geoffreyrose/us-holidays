<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class TimezoneTest extends TestCase
{

    public function testIsHoliday()
    {
        $carbon = Carbon::create(2020, 07, 4, 0,0,0,'America/New_York');
        $this->assertTrue($carbon->isHoliday());
        $this->assertEquals("Independence Day", $carbon->getHolidayName());

        $carbon = Carbon::create(2020, 07, 4, 23,59,59,'America/New_York');
        $this->assertTrue($carbon->isHoliday());
        $this->assertEquals("Independence Day", $carbon->getHolidayName());
    }

    public function testGetHolidaysInYear()
    {
        $holidays = Carbon::create(2020, 07, 4, 0,0,0,'America/New_York');
        $carbon = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($carbon->date->isHoliday());
        $this->assertEquals("Independence Day", $carbon->date->getHolidayName());

        $holidays = Carbon::create(2020, 07, 4, 23,59,59,'America/New_York');
        $carbon = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($carbon->date->isHoliday());
        $this->assertEquals("Independence Day", $carbon->date->getHolidayName());
    }

    public function testGetHolidaysByYear()
    {
        $holidays = Carbon::create(2020, 01, 01, 0,0,0,'America/New_York');
        $carbon = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $carbon->date
                ->isSameDay( Carbon::create(2020, 01, 01, 0,0,0))
        );

        $holidays = Carbon::create(2020, 12, 31, 23,59,59,'America/New_York');
        $carbon = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $carbon->date
                ->isSameDay( Carbon::create(2020, 01, 01, 0,0,0))
        );
    }
}
