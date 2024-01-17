<?php

namespace Tests\Holidays\YomKippur;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class YomKippurTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getYomKippurHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 27))
        );

        $this->assertTrue(
            $usHoliday->getYomKippurHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 28))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertEquals('Yom Kippur', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getYomKippurHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
