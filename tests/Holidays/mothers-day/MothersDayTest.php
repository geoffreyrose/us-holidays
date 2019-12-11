<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class MothersDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getMothersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 11))
        );

        $this->assertTrue(
            $carbon->getMothersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 10))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertEquals("Mother's Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
