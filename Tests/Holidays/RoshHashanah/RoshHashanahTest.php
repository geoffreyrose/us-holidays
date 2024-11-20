<?php

namespace Tests\Holidays\RoshHashanah;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class RoshHashanahTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getRoshHashanahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 18))
        );

        $this->assertTrue(
            $holidays->getRoshHashanahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 19))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertEquals('Rosh Hashanah', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
