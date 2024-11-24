<?php

namespace Tests\Holidays\ChristmasEve;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ChristmasEveTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getChristmasEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $holidays->getChristmasEveHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 24))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertEquals('Christmas Eve', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
