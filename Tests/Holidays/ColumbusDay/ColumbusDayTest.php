<?php

namespace Tests\Holidays\ColumbusDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ColumbusDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getColumbusDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $holidays->getColumbusDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 12))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertEquals('Columbus Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
