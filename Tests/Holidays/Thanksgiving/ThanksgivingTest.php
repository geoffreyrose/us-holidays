<?php

namespace Tests\Holidays\Thanksgiving;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ThanksgivingTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getThanksgivingHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 25))
        );

        $this->assertTrue(
            $holidays->getThanksgivingHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 26))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertEquals('Thanksgiving', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
