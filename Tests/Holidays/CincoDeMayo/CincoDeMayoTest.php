<?php

namespace Tests\Holidays\CincoDeMayo;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class CincoDeMayoTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getCincoDeMayoHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 4))
        );

        $this->assertTrue(
            $holidays->getCincoDeMayoHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 5, 5))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertEquals('Cinco de Mayo', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
