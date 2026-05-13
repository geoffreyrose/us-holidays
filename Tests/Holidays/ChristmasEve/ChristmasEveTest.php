<?php

namespace Tests\Holidays\ChristmasEve;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ChristmasEveTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getChristmasEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $holidays->getChristmasEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 24))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertEquals('Christmas Eve', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
