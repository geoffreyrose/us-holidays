<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class TimezoneTest extends TestCase
{
    public function test_is_holiday()
    {
        $holidays = USHolidays::create(2020, 07, 4, 0, 0, 0, 'America/New_York');
        $this->assertTrue($holidays->isHoliday());
        $this->assertEquals('Independence Day', $holidays->getHolidayName());

        $holidays = USHolidays::create(2020, 07, 4, 23, 59, 59, 'America/New_York');
        $this->assertTrue($holidays->isHoliday());
        $this->assertEquals('Independence Day', $holidays->getHolidayName());
    }

    public function test_get_holidays_in_year()
    {
        $holidays = USHolidays::create(2020, 07, 4, 0, 0, 0, 'America/New_York');
        $holidays = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($holidays->date->isHoliday());
        $this->assertEquals('Independence Day', $holidays->date->getHolidayName());

        $holidays = USHolidays::create(2020, 07, 4, 23, 59, 59, 'America/New_York');
        $holidays = $holidays->getHolidaysInYears()[0];

        $this->assertTrue($holidays->date->isHoliday());
        $this->assertEquals('Independence Day', $holidays->date->getHolidayName());
    }

    public function test_get_holidays_by_year()
    {
        $holidays = USHolidays::create(2020, 01, 01, 0, 0, 0, 'America/New_York');
        $holidays = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $holidays->date
                ->isSameDay(USHolidays::create(2020, 01, 01, 0, 0, 0))
        );

        $holidays = USHolidays::create(2020, 12, 31, 23, 59, 59, 'America/New_York');
        $holidays = $holidays->getHolidaysByYear()[0];

        $this->assertTrue(
            $holidays->date
                ->isSameDay(USHolidays::create(2020, 01, 01, 0, 0, 0))
        );
    }
}
