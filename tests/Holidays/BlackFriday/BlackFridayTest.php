<?php

namespace Tests\Holidays\BlackFriday;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class BlackFridayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getBlackFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );

        $this->assertTrue(
            $usHoliday->getBlackFridayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 27))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertEquals('Black Friday', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getBlackFridayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
