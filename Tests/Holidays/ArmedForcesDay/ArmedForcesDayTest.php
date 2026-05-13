<?php

namespace Tests\Holidays\ArmedForcesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ArmedForcesDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getArmedForcesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 18))
        );

        $this->assertTrue(
            $holidays->getArmedForcesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 16))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertEquals('Armed Forces Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getArmedForcesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
