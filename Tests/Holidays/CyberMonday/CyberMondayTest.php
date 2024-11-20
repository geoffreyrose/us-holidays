<?php

namespace Tests\Holidays\CyberMonday;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class CyberMondayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2022, 1, 1);

        $this->assertFalse(
            $holidays->getCyberMondayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2022, 11, 21))
        );

        $this->assertTrue(
            $holidays->getCyberMondayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2022, 11, 28))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertEquals('Cyber Monday', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2021, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
