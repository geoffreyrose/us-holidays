<?php

namespace Tests\Holidays\MlkDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class MLKDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getMLKDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 21))
        );

        $this->assertTrue(
            $usHoliday->getMLKDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 20))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertEquals('Martin Luther King Jr. Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
