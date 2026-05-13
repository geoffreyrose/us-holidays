<?php

namespace Tests\Holidays\PatriotDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PatriotDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPatriotDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 12))
        );

        $this->assertTrue(
            $holidays->getPatriotDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 11))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertEquals('Patriot Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPatriotDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
