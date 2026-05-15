<?php

namespace Tests\Holidays\MothersDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class MothersDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getMothersDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 11))
        );

        $this->assertTrue(
            $holidays->getMothersDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 10))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertEquals("Mother's Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMothersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
