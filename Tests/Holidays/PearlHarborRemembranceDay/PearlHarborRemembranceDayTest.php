<?php

namespace Tests\Holidays\PearlHarborRemembranceDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PearlHarborRemembranceDayTest extends TestCase
{
    public function testHoliday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 6))
        );

        $this->assertTrue(
            $holidays->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 7))
        );
    }

    public function testHolidayName()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertEquals('Pearl Harbor Remembrance Day', $holiday->name);
    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
