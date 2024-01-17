<?php

namespace Tests\Holidays\MemorialDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class MemorialDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getMemorialDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 24))
        );

        $this->assertTrue(
            $usHoliday->getMemorialDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 25))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertEquals('Memorial Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
