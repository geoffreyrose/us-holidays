<?php

namespace Tests\Holidays\DaylightSavingStart;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class DaylightSavingStartTest extends TestCase
{
    public function test_holiday()
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

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertEquals('Daylight Saving (Start)', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getDaylightSavingStartHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
