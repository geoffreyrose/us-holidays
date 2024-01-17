<?php

namespace Tests\Holidays\NewYearsDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class NewYearsDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 2))
        );

        $this->assertTrue(
            $usHoliday->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 1))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertEquals("New Year's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
