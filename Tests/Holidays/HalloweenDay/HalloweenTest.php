<?php

namespace Tests\Holidays\HalloweenDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class HalloweenTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getHalloweenHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 30))
        );

        $this->assertTrue(
            $holidays->getHalloweenHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 31))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertEquals('Halloween', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
