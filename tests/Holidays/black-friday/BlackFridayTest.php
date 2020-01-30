<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class BlackFridayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getBlackFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );

        $this->assertTrue(
            $carbon->getBlackFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 27))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertEquals("Black Friday", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
