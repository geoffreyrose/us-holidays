<?php

namespace Tests\Holidays\PatriotDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PatriotDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getPatriotDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 12))
        );

        $this->assertTrue(
            $usHoliday->getPatriotDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 11))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertEquals('Patriot Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
