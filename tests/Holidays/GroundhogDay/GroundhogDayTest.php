<?php

namespace Tests\Holidays\GroundhogDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class GroundhogDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getGroundhogDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 3))
        );

        $this->assertTrue(
            $carbon->getGroundhogDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 2))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertEquals("Groundhog Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
