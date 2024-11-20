<?php

namespace Tests\Holidays\PresidentsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PresidentsDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPresidentsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 16))
        );

        $this->assertTrue(
            $holidays->getPresidentsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 17))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertEquals("Presidents' Day", $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
