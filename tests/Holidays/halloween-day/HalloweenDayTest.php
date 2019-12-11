<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class HalloweenDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getHalloweenDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 10, 30))
        );

        $this->assertTrue(
            $carbon->getHalloweenDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 10, 31))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenDayHoliday();

        $this->assertEquals("Halloween", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
