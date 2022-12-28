<?php

namespace Tests\Holidays\MlkDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class MLKDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getMLKDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 21))
        );

        $this->assertTrue(
            $carbon->getMLKDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 20))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertEquals("Martin Luther King Jr. Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
