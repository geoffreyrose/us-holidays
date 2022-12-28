<?php

namespace Tests\Holidays\MothersDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class MothersDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getMothersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 11))
        );

        $this->assertTrue(
            $carbon->getMothersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 10))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertEquals("Mother's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
