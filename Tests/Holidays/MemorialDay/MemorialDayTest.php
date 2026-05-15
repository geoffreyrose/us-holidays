<?php

namespace Tests\Holidays\MemorialDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class MemorialDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getMemorialDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 24))
        );

        $this->assertTrue(
            $holidays->getMemorialDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 25))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertEquals('Memorial Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getMemorialDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
