<?php

namespace Tests\Holidays\TaxDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class TaxDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 16))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 15))
        );

        // when 4/15 if Sunday
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2018, 4, 15))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2018, 4, 17))
        );

        // when 4/15 if Saturday
        $carbon = new Carbon();
        $carbon = Carbon::create(2017, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2017, 4, 15))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2017, 4, 18))
        );

        // when 4/15 is Friday
        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2016, 4, 15))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2016, 4, 18))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertEquals("Tax Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }
}
