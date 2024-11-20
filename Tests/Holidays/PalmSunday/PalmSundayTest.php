<?php

namespace Tests\Holidays\PalmSunday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PalmSundayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPalmSundayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 4))
        );

        $this->assertTrue(
            $holidays->getPalmSundayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 5))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertEquals('Palm Sunday', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPalmSundayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
