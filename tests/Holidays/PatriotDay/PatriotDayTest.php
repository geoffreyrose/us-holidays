<?php

namespace Tests\Holidays\PatriotDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PatriotDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPatriotDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 12))
        );

        $this->assertTrue(
            $carbon->getPatriotDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertEquals("Patriot Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
