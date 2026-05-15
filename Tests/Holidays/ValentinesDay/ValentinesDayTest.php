<?php

namespace Tests\Holidays\ValentinesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ValentinesDayTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getValentinesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 15))
        );

        $this->assertTrue(
            $holidays->getValentinesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 14))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertEquals("Valentine's Day", $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
