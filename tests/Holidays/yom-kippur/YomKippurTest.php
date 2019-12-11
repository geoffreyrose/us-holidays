<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class YomKippurTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getYomKippurHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 27))
        );

        $this->assertTrue(
            $carbon->getYomKippurHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 28))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertEquals("Yom Kippur", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
