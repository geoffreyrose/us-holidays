<?php

namespace Tests\Holidays\OrthodoxEaster;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class OrthodoxEasterTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getOrthodoxEasterHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 18))
        );

        $this->assertTrue(
            $carbon->getOrthodoxEasterHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 19))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertEquals("Orthodox Easter", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
