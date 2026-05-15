<?php

namespace Tests\Holidays\RoshHashanah;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class RoshHashanahTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getRoshHashanahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 18))
        );

        $this->assertTrue(
            $holidays->getRoshHashanahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 19))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertEquals('Rosh Hashanah', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
