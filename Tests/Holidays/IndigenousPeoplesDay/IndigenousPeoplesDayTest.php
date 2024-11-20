<?php

namespace Tests\Holidays\IndigenousPeoplesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class IndigenousPeoplesDayTest extends TestCase
{
    public function testHoliday()
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

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertEquals("Indigenous Peoples' Day", $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
