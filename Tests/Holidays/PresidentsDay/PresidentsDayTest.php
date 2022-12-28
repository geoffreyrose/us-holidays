<?php

namespace Tests\Holidays\PresidentsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PresidentsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPresidentsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 16))
        );

        $this->assertTrue(
            $carbon->getPresidentsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 17))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertEquals("Presidents' Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
