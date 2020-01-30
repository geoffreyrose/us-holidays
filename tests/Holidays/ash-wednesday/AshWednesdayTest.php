<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class AshWednesdayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getAshWednesdayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 24))
        );

        $this->assertTrue(
            $carbon->getAshWednesdayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 26))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertEquals("Ash Wednesday", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
