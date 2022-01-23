<?php

namespace Tests\Holidays\DaylightSavingEnd;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class DaylightSavingEndTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getDaylightSavingEndHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 2))
        );

        $this->assertTrue(
            $carbon->getDaylightSavingEndHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 1))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertEquals("Daylight Saving (End)", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
