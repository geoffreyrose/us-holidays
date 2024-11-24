<?php

namespace Tests\Holidays\GoodFriday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class GoodFridayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getGoodFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 11))
        );

        $this->assertTrue(
            $holidays->getGoodFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 10))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertEquals('Good Friday', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
