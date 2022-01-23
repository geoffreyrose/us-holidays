<?php

namespace Tests\Holidays\MemorialDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class MemorialDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getMemorialDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 24))
        );

        $this->assertTrue(
            $carbon->getMemorialDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 25))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertEquals("Memorial Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }
}
