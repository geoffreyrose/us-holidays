<?php

namespace Tests\Holidays\AshWednesday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class AshWednesdayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getAshWednesdayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 24))
        );

        $this->assertTrue(
            $holidays->getAshWednesdayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 26))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertEquals('Ash Wednesday', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
