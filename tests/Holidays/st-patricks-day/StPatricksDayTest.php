<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class StPatricksDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getStPatricksDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 3, 16))
        );

        $this->assertTrue(
            $carbon->getStPatricksDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 3, 17))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertEquals("St. Patrick's Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
