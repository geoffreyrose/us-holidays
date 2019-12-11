<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class FlagsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getFlagsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 6, 13))
        );

        $this->assertTrue(
            $carbon->getFlagsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 6, 14))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagsDayHoliday();

        $this->assertEquals("Flag Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagsDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagsDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
