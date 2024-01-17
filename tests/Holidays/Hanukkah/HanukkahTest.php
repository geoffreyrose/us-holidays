<?php

namespace Tests\Holidays\Hanukkah;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class HanukkahTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getHanukkahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 12))
        );

        $this->assertTrue(
            $usHoliday->getHanukkahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 11))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertEquals('Hanukkah', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getHanukkahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
