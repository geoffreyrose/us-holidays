<?php

namespace Tests\Holidays\PalmSunday;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PalmSundayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPalmSundayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 4))
        );

        $this->assertTrue(
            $carbon->getPalmSundayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 5))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertEquals("Palm Sunday", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
