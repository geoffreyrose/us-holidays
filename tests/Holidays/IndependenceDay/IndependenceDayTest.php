<?php

namespace Tests\Holidays\IndependenceDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class IndependenceDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getIndependenceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 7, 3))
        );

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 7, 4))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertEquals("Independence Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
