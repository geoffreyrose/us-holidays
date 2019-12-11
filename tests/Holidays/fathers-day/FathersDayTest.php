<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class FathersDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getFathersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 6, 22))
        );

        $this->assertTrue(
            $carbon->getFathersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 6, 21))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertEquals("Father's Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
