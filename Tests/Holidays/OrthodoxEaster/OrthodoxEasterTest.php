<?php

namespace Tests\Holidays\OrthodoxEaster;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class OrthodoxEasterTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 18))
        );

        $this->assertTrue(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 19))
        );
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertEquals('Orthodox Easter', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
