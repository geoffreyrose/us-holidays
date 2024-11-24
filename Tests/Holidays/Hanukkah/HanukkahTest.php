<?php

namespace Tests\Holidays\Hanukkah;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class HanukkahTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getHanukkahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 12))
        );

        $this->assertTrue(
            $holidays->getHanukkahHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 11))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertEquals('Hanukkah', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
