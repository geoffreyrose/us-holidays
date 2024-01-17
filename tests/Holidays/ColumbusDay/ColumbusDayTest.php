<?php

namespace Tests\Holidays\ColumbusDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ColumbusDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getColumbusDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $usHoliday->getColumbusDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertEquals('Columbus Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
