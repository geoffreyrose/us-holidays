<?php

namespace Tests\Holidays\AprilFoolsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class AprilFoolsDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getAprilFoolsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 2))
        );

        $this->assertTrue(
            $holidays->getAprilFoolsDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 1))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertEquals("April Fools' Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2021, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
