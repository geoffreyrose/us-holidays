<?php

namespace Tests\Holidays\OrthodoxEaster;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class OrthodoxEasterTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 18))
        );

        $this->assertTrue(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 19))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertEquals('Orthodox Easter', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
