<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class EarthDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getEarthDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 21))
        );

        $this->assertTrue(
            $carbon->getEarthDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 22))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertEquals("Earth Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
