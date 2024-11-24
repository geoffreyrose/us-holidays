<?php

namespace Tests\Holidays\PatriotDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PatriotDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPatriotDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 12))
        );

        $this->assertTrue(
            $holidays->getPatriotDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 11))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertEquals('Patriot Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
