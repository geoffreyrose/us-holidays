<?php

namespace Tests\Holidays\Kwanzaa;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class KwanzaaTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getKwanzaaHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $holidays->getKwanzaaHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 26))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertEquals('Kwanzaa', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
