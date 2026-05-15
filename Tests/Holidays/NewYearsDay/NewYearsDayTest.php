<?php

namespace Tests\Holidays\NewYearsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class NewYearsDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getNewYearsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 2))
        );

        $this->assertTrue(
            $holidays->getNewYearsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 1))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertEquals("New Year's Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
