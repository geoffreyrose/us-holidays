<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PatriotsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPatriotsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 12))
        );

        $this->assertTrue(
            $carbon->getPatriotsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotsDayHoliday();

        $this->assertEquals("Patriot Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotsDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotsDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
