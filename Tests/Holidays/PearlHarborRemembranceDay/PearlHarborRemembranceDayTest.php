<?php

namespace Tests\Holidays\PearlHarborRemembranceDay;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PearlHarborRemembranceDayTest extends TestCase
{
    public function test_holiday()
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

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertEquals('Pearl Harbor Remembrance Day', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
