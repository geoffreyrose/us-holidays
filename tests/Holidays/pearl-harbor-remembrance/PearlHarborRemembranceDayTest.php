<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PearlHarborRemembranceDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getPearlHarborRemembranceDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 6))
        );

        $this->assertTrue(
            $carbon->getPearlHarborRemembranceDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 7))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertEquals("Pearl Harbor Remembrance Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
