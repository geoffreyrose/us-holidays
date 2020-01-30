<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class AprilFoolsDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getAprilFoolsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 2))
        );

        $this->assertTrue(
            $carbon->getAprilFoolsDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 1))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertEquals("April Fool's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getAprilFoolsDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
