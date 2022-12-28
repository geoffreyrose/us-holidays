<?php

namespace Tests\Holidays\IndigenousPeoplesDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class IndigenousPeoplesDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $carbon->getIndigenousPeoplesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertEquals("Indigenous Peoples' Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndigenousPeoplesDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
