<?php

namespace Tests\Holidays\AprilFoolsDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class CyberMondayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2022, 1, 1);

        $this->assertFalse(
            $carbon->getCyberMondayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2022, 11, 21))
        );

        $this->assertTrue(
            $carbon->getCyberMondayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2022, 11, 28))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertEquals("Cyber Monday", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
