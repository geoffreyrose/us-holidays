<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ThanksgivingTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 25))
        );

        $this->assertTrue(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertEquals("Thanksgiving", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
