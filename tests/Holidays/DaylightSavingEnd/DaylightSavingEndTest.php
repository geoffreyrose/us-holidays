<?php

namespace Tests\Holidays\DaylightSavingEnd;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class DaylightSavingEndTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getDaylightSavingEndHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 2))
        );

        $this->assertTrue(
            $usHoliday->getDaylightSavingEndHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 1))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertEquals('Daylight Saving (End)', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
