<?php

namespace Tests\Holidays\DaylightSavingStart;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class DaylightSavingStartTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getDaylightSavingStartHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 7))
        );

        $this->assertTrue(
            $holidays->getDaylightSavingStartHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 8))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertEquals('Daylight Saving (Start)', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
