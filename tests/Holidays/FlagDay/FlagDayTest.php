<?php

namespace Tests\Holidays\FlagDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class FlagDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getFlagDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 13))
        );

        $this->assertTrue(
            $carbon->getFlagDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 14))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertEquals("Flag Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
