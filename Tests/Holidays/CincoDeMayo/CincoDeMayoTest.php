<?php

namespace Tests\Holidays\CincoDeMayo;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class CincoDeMayoTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getCincoDeMayoHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 4))
        );

        $this->assertTrue(
            $carbon->getCincoDeMayoHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 5))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertEquals("Cinco de Mayo", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
