<?php

namespace Tests\Holidays\FathersDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class FathersDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getFathersDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 22))
        );

        $this->assertTrue(
            $holidays->getFathersDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 21))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertEquals("Father's Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getFathersDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
