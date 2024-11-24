<?php

namespace Tests\Holidays\ColumbusDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ColumbusDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getColumbusDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $holidays->getColumbusDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertEquals('Columbus Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
