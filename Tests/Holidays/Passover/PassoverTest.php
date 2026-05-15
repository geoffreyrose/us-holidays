<?php

namespace Tests\Holidays\Passover;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PassoverTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPassoverHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 8))
        );

        $this->assertTrue(
            $holidays->getPassoverHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 9))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertEquals('Passover', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
