<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PearlHarborRemembranceTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPearlHarborRemembranceHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 6))
        );

        $this->assertTrue(
            $carbon->getPearlHarborRemembranceHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 7))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceHoliday();

        $this->assertEquals("Pearl Harbor Remembrance Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
