<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class JuneteenthTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getJuneteenthHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 18))
        );

        $this->assertTrue(
            $carbon->getJuneteenthHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 19))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertEquals("Juneteenth", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
