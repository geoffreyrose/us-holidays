<?php

namespace Tests\Holidays\TaxDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class TaxDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 16))
        );

        $this->assertTrue(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 15))
        );

        // when 4/15 if Sunday

        $holidays = USHolidays::create(2018, 1, 1);

        $this->assertFalse(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2018, 4, 15))
        );

        $this->assertTrue(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2018, 4, 17))
        );

        // when 4/15 if Saturday

        $holidays = USHolidays::create(2017, 1, 1);

        $this->assertFalse(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2017, 4, 15))
        );

        $this->assertTrue(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2017, 4, 18))
        );

        // when 4/15 is Friday

        $holidays = USHolidays::create(2016, 1, 1);

        $this->assertFalse(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2016, 4, 15))
        );

        $this->assertTrue(
            $holidays->getTaxDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2016, 4, 18))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertEquals('Tax Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
