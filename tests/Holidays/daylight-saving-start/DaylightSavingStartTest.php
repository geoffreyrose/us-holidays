<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class DaylightSavingStartTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getDaylightSavingStartHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 3, 7))
        );

        $this->assertTrue(
            $carbon->getDaylightSavingStartHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 3, 8))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertEquals("Daylight Saving (Start)", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
