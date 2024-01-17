<?php

namespace Tests\Holidays\IndigenousPeoplesDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class IndigenousPeoplesDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $usHoliday->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertEquals("Indigenous Peoples' Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
