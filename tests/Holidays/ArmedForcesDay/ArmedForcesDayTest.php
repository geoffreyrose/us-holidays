<?php

namespace Tests\Holidays\ArmedForcesDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ArmedForcesDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getArmedForcesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 18))
        );

        $this->assertTrue(
            $usHoliday->getArmedForcesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 16))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertEquals('Armed Forces Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
