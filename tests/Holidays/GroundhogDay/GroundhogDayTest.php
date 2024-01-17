<?php

namespace Tests\Holidays\GroundhogDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class GroundhogDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getGroundhogDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 3))
        );

        $this->assertTrue(
            $usHoliday->getGroundhogDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 2))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertEquals('Groundhog Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
