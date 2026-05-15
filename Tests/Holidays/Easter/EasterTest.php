<?php

namespace Tests\Holidays\Easter;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class EasterTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 11))
        );

        $this->assertTrue(
            $holidays->getEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 12))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEasterHoliday();

        $this->assertEquals('Easter', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
