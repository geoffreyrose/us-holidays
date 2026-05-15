<?php

namespace Tests\Holidays\BlackFriday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class BlackFridayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getBlackFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 26))
        );

        $this->assertTrue(
            $holidays->getBlackFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 27))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertEquals('Black Friday', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
