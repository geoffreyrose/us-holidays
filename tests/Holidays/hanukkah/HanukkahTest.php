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
            $carbon->getHanukkahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 12))
        );

        $this->assertTrue(
            $carbon->getHanukkahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertEquals("Hanukkah", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
