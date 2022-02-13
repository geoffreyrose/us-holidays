<?php

namespace Tests\Holidays\FathersDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class FathersDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getFathersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 22))
        );

        $this->assertTrue(
            $carbon->getFathersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 21))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertEquals("Father's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
