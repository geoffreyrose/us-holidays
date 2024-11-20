<?php

namespace Tests\Holidays\LaborDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class LaborDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getLaborDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 8))
        );

        $this->assertTrue(
            $holidays->getLaborDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 7))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertEquals('Labor Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getLaborDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
