<?php

namespace Tests\Holidays\Juneteenth;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class JuneteenthTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getJuneteenthHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 18))
        );

        $this->assertTrue(
            $holidays->getJuneteenthHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 6, 19))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertEquals('Juneteenth', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $holiday = USHolidays::create(2021, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2023, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $holiday = USHolidays::create(2021, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $holiday = USHolidays::create(2022, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
