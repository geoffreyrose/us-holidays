<?php

namespace Tests\Holidays\StPatricksDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class StPatricksDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getStPatricksDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 16))
        );

        $this->assertTrue(
            $holidays->getStPatricksDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 17))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertEquals("St. Patrick's Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
