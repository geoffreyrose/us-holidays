<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ArmedForcesDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getArmedForcesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 18))
        );

        $this->assertTrue(
            $carbon->getArmedForcesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 16))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertEquals("Armed Forces Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
