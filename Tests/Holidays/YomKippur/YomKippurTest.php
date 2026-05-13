<?php

namespace Tests\Holidays\YomKippur;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class YomKippurTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getYomKippurHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 27))
        );

        $this->assertTrue(
            $holidays->getYomKippurHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 28))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertEquals('Yom Kippur', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
