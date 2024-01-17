<?php

namespace Tests\Holidays\ChristmasEve;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ChristmasEveTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getChristmasEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $usHoliday->getChristmasEveHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 24))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertEquals('Christmas Eve', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasEveHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
