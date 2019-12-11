<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class GoodFridayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getGoodFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 11))
        );

        $this->assertTrue(
            $carbon->getGoodFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 10))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertEquals("Good Friday", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
