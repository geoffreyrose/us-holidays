<?php

namespace Tests\Holidays\EarthDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class EarthDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getEarthDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 21))
        );

        $this->assertTrue(
            $holidays->getEarthDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 22))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertEquals('Earth Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEarthDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
