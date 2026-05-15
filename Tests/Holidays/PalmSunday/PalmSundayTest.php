<?php

namespace Tests\Holidays\PalmSunday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PalmSundayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPalmSundayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 4))
        );

        $this->assertTrue(
            $holidays->getPalmSundayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 5))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertEquals('Palm Sunday', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
