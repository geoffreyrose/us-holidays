<?php

namespace Tests\Holidays\IndependenceDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class IndependenceDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getIndependenceDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 7, 3))
        );

        $this->assertTrue(
            $holidays->getIndependenceDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 7, 4))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertEquals('Independence Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $holiday = USHolidays::create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $holiday = USHolidays::create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
