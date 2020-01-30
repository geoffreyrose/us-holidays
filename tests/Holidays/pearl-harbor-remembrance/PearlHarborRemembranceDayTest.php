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
            $carbon->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 6))
        );

        $this->assertTrue(
            $carbon->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 7))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertEquals("Pearl Harbor Remembrance Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
