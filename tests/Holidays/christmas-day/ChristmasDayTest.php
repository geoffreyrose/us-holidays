<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ChristmasDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getChristmasDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 24))
        );

        $this->assertTrue(
            $carbon->getChristmasDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertEquals("Christmas Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
