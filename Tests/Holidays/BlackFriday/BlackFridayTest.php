<?php

namespace Tests\Holidays\BlackFriday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class BlackFridayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getBlackFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 26))
        );

        $this->assertTrue(
            $holidays->getBlackFridayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 27))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertEquals('Black Friday', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
