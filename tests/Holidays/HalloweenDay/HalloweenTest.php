<?php

namespace Tests\Holidays\HalloweenDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class HalloweenTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getHalloweenHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 30))
        );

        $this->assertTrue(
            $carbon->getHalloweenHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 31))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertEquals("Halloween", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHalloweenHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
