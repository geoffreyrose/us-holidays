<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class EasterTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getEasterHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 11))
        );

        $this->assertTrue(
            $carbon->getEasterHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 12))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEasterHoliday();

        $this->assertEquals("Easter", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEasterHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getEasterHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
