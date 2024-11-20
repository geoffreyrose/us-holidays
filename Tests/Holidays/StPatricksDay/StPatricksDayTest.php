<?php

namespace Tests\Holidays\StPatricksDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class StPatricksDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getStPatricksDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 16))
        );

        $this->assertTrue(
            $holidays->getStPatricksDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 3, 17))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertEquals("St. Patrick's Day", $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getStPatricksDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
