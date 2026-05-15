<?php

namespace Tests\Holidays\GroundhogDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class GroundhogDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getGroundhogDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 3))
        );

        $this->assertTrue(
            $holidays->getGroundhogDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 2))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertEquals('Groundhog Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGroundhogDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
