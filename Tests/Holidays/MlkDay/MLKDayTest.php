<?php

namespace Tests\Holidays\MlkDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class MLKDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getMLKDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 21))
        );

        $this->assertTrue(
            $holidays->getMLKDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 20))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertEquals('Martin Luther King Jr. Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
