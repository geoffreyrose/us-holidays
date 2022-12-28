<?php

namespace Tests\Holidays\Thanksgiving;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ThanksgivingTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getThanksgivingHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 25))
        );

        $this->assertTrue(
            $carbon->getThanksgivingHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertEquals("Thanksgiving", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
