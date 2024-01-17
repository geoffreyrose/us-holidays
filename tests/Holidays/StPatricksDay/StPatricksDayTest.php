<?php

namespace Tests\Holidays\StPatricksDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class StPatricksDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getStPatricksDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 3, 16))
        );

        $this->assertTrue(
            $usHoliday->getStPatricksDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 3, 17))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertEquals("St. Patrick's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
