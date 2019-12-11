<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class RoshHashanahTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getRoshHashanahHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 18))
        );

        $this->assertTrue(
            $carbon->getRoshHashanahHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 9, 19))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertEquals("Rosh Hashanah", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
