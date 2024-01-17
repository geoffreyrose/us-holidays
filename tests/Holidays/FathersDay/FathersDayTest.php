<?php

namespace Tests\Holidays\FathersDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class FathersDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getFathersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 22))
        );

        $this->assertTrue(
            $usHoliday->getFathersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 21))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertEquals("Father's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
