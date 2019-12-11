<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ValentinesDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getValentinesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 2, 15))
        );

        $this->assertTrue(
            $carbon->getValentinesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 2, 14))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertEquals("Valentine's Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
