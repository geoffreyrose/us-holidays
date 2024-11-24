<?php

namespace Tests\Holidays\FlagDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class FlagDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getFlagDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 13))
        );

        $this->assertTrue(
            $holidays->getFlagDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 14))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertEquals('Flag Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFlagDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
