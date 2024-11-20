<?php

namespace Tests\Holidays\HalloweenDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class HalloweenTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getHalloweenHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 30))
        );

        $this->assertTrue(
            $holidays->getHalloweenHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 31))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertEquals('Halloween', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
