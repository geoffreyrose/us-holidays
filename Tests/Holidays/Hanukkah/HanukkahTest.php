<?php

namespace Tests\Holidays\Hanukkah;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class HanukkahTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getHanukkahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 12))
        );

        $this->assertTrue(
            $holidays->getHanukkahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 11))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertEquals('Hanukkah', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
