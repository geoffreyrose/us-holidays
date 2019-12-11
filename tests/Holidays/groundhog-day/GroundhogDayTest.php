<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class GroundhogDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getGroundhogDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 2, 3))
        );

        $this->assertTrue(
            $carbon->getGroundhogDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 2, 2))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertEquals("Groundhog Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
