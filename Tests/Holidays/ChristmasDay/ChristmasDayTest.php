<?php

namespace Tests\Holidays\ChristmasDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ChristmasDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getChristmasDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 24))
        );

        $this->assertTrue(
            $carbon->getChristmasDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertEquals("Christmas Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
