<?php

namespace Tests\Holidays\AprilFoolsDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class AprilFoolsDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getAprilFoolsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 2))
        );

        $this->assertTrue(
            $usHoliday->getAprilFoolsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 1))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertEquals("April Fools' Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
