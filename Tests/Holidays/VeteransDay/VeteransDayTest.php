<?php

namespace Tests\Holidays\VeteransDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class VeteransDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getVeteransDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 12))
        );

        $this->assertTrue(
            $holidays->getVeteransDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 11, 11))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertEquals('Veterans Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $holiday = USHolidays::create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $holiday = USHolidays::create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
