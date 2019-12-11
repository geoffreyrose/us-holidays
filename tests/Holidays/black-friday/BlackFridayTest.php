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
            $carbon->getBlackFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );

        $this->assertTrue(
            $carbon->getBlackFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 27))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertEquals("Black Friday", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
