<?php

namespace Tests\Holidays\MothersDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class MothersDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getMothersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 11))
        );

        $this->assertTrue(
            $usHoliday->getMothersDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 10))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertEquals("Mother's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
