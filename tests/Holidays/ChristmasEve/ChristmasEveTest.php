<?php

namespace Tests\Holidays\ChristmasEve;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ChristmasEveTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getChristmasEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $carbon->getChristmasEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 24))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertEquals("Christmas Eve", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
