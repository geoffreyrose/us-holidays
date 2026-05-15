<?php

namespace Tests\Holidays\MlkDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class MLKDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getMLKDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 21))
        );

        $this->assertTrue(
            $holidays->getMLKDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 1, 20))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertEquals('Martin Luther King Jr. Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMLKDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
