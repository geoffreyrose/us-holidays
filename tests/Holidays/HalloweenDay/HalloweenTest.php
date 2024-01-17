<?php

namespace Tests\Holidays\HalloweenDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class HalloweenTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getHalloweenHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 30))
        );

        $this->assertTrue(
            $usHoliday->getHalloweenHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 31))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertEquals('Halloween', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
