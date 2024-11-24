<?php

namespace Tests\Holidays\Thanksgiving;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ThanksgivingTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getThanksgivingHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 25))
        );

        $this->assertTrue(
            $holidays->getThanksgivingHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 26))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertEquals('Thanksgiving', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
