<?php

namespace Tests\Holidays\LaborDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class LaborDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getLaborDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 8))
        );

        $this->assertTrue(
            $usHoliday->getLaborDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 7))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertEquals('Labor Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
