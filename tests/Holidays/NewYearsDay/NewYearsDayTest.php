<?php

namespace Tests\Holidays\NewYearsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class NewYearsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 2))
        );

        $this->assertTrue(
            $carbon->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 1))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertEquals("New Year's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }
}
