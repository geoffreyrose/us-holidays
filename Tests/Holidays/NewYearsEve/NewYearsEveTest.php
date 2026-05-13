<?php

namespace Tests\Holidays\NewYearsEve;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class NewYearsEveTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getNewYearsEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 30))
        );

        $this->assertTrue(
            $holidays->getNewYearsEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 31))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertEquals("New Year's Eve", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsEveHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
