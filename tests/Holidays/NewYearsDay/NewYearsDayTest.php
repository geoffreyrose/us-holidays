<?php

namespace Tests\Holidays\NewYearsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class NewYearsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 2))
        );

        $this->assertTrue(
            $carbon->getNewYearsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 1, 1))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertEquals("New Year's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getNewYearsDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2022, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2023, 1, 1)->getNewYearsDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
