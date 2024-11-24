<?php

namespace Tests\Holidays\ValentinesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ValentinesDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getValentinesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 15))
        );

        $this->assertTrue(
            $holidays->getValentinesDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 2, 14))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertEquals("Valentine's Day", $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
