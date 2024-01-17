<?php

namespace Tests\Holidays\EarthDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class EarthDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getEarthDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 21))
        );

        $this->assertTrue(
            $usHoliday->getEarthDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 22))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertEquals('Earth Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
