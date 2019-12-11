<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class VeteransDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getVeteransDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 12))
        );

        $this->assertTrue(
            $carbon->getVeteransDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 11, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertEquals("Veterans Day", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->isBankHoliday());
    }
}
