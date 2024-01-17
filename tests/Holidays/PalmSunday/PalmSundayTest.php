<?php

namespace Tests\Holidays\PalmSunday;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PalmSundayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getPalmSundayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 4))
        );

        $this->assertTrue(
            $usHoliday->getPalmSundayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 5))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertEquals('Palm Sunday', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
