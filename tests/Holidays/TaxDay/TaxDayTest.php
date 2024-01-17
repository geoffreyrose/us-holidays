<?php

namespace Tests\Holidays\TaxDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class TaxDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 16))
        );

        $this->assertTrue(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 15))
        );

        // when 4/15 if Sunday
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2018, 1, 1);

        $this->assertFalse(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2018, 4, 15))
        );

        $this->assertTrue(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2018, 4, 17))
        );

        // when 4/15 if Saturday
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2017, 1, 1);

        $this->assertFalse(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2017, 4, 15))
        );

        $this->assertTrue(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2017, 4, 18))
        );

        // when 4/15 is Friday
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2016, 1, 1);

        $this->assertFalse(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2016, 4, 15))
        );

        $this->assertTrue(
            $usHoliday->getTaxDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2016, 4, 18))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertEquals('Tax Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getTaxDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
