<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class HanukkahTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getHanukkahHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 12))
        );

        $this->assertTrue(
            $carbon->getHanukkahHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 12, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertEquals("Hanukkah", $holiday->getHolidayName());
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->isBankHoliday());
    }
}
