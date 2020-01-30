<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class NewYearsEveTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 30))
        );

        $this->assertTrue(
            $carbon->getNewYearsEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertEquals("New Year's Eve", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
