<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class NewYearsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 1, 2))
        );

        $this->assertTrue(
            $carbon->getNewYearsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 1, 1))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertEquals("New Year's Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
