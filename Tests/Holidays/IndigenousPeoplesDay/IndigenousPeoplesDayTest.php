<?php

namespace Tests\Holidays\IndigenousPeoplesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class IndigenousPeoplesDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $holidays->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 12))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertEquals("Indigenous Peoples' Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
