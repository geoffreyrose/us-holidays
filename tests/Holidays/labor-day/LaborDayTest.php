<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class LaborDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getLaborDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 8))
        );

        $this->assertTrue(
            $carbon->getLaborDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 7))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertEquals("Labor Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
