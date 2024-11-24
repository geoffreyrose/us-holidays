<?php

namespace Tests\Holidays\ChristmasDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class ChristmasDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getChristmasDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 24))
        );

        $this->assertTrue(
            $holidays->getChristmasDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 25))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertEquals('Christmas Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
