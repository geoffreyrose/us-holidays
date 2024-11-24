<?php

namespace Tests\Holidays\YomKippur;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class YomKippurTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getYomKippurHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 27))
        );

        $this->assertTrue(
            $holidays->getYomKippurHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 9, 28))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertEquals('Yom Kippur', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
