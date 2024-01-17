<?php

namespace Tests\Holidays\DaylightSavingStart;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class DaylightSavingStartTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getDaylightSavingStartHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 3, 7))
        );

        $this->assertTrue(
            $usHoliday->getDaylightSavingStartHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 3, 8))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertEquals('Daylight Saving (Start)', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
