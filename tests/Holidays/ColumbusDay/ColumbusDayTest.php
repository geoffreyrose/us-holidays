<?php

namespace Tests\Holidays\ColumbusDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class ColumbusDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getColumbusDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 11))
        );

        $this->assertTrue(
            $carbon->getColumbusDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 10, 12))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertEquals("Columbus Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getColumbusDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }
}
