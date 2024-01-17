<?php

namespace Tests\Holidays\GoodFriday;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class GoodFridayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getGoodFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 11))
        );

        $this->assertTrue(
            $usHoliday->getGoodFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 10))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertEquals('Good Friday', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getGoodFridayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
