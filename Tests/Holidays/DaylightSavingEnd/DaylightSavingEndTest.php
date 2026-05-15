<?php

namespace Tests\Holidays\DaylightSavingEnd;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class DaylightSavingEndTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getDaylightSavingEndHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 2))
        );

        $this->assertTrue(
            $holidays->getDaylightSavingEndHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 1))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertEquals('Daylight Saving (End)', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingEndHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
