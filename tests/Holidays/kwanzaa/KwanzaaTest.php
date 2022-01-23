<?php

namespace Tests\Holidays\Kwanzaa;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class KwanzaaTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getKwanzaaHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $carbon->getKwanzaaHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 26))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertEquals("Kwanzaa", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
