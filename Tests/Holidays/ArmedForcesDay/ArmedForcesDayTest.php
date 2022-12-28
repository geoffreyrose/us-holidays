<?php

namespace Tests\Holidays\ArmedForcesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ArmedForcesDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getArmedForcesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 18))
        );

        $this->assertTrue(
            $carbon->getArmedForcesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 16))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertEquals("Armed Forces Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
