<?php

namespace Tests\Holidays\PresidentsDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PresidentsDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getPresidentsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 16))
        );

        $this->assertTrue(
            $usHoliday->getPresidentsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 17))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertEquals("Presidents' Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
