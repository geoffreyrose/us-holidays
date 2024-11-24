<?php

namespace Tests\Holidays\GroundhogDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class GroundhogDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getGroundhogDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 3))
        );

        $this->assertTrue(
            $holidays->getGroundhogDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 2))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertEquals('Groundhog Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
