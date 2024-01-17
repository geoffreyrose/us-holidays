<?php

namespace Tests\Holidays\FlagDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class FlagDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getFlagDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 13))
        );

        $this->assertTrue(
            $usHoliday->getFlagDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 14))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertEquals('Flag Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
