<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ColumbusDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getColumbusDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $carbon->getColumbusDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertEquals("Columbus Day, Indigenous Peoples' Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
