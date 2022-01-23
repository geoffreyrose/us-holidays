<?php

namespace Tests\Holidays\LaborDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class LaborDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getLaborDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 8))
        );

        $this->assertTrue(
            $carbon->getLaborDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 7))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertEquals("Labor Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }
}
