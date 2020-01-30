<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PassoverTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPassoverHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 8))
        );

        $this->assertTrue(
            $carbon->getPassoverHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 9))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertEquals("Passover", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPassoverHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
