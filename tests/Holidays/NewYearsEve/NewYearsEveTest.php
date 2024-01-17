<?php

namespace Tests\Holidays\NewYearsEve;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class NewYearsEveTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getNewYearsEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 30))
        );

        $this->assertTrue(
            $usHoliday->getNewYearsEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertEquals("New Year's Eve", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
