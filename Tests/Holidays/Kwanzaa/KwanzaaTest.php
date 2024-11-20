<?php

namespace Tests\Holidays\Kwanzaa;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class KwanzaaTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getKwanzaaHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $holidays->getKwanzaaHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 26))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertEquals('Kwanzaa', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
