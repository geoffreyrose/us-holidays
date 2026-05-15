<?php

namespace Tests\Holidays\PresidentsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PresidentsDayTest extends TestCase
{
    public function test_holiday()
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

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertEquals("Presidents' Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPresidentsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
