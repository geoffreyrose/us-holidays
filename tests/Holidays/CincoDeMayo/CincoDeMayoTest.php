<?php

namespace Tests\Holidays\CincoDeMayo;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class CincoDeMayoTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getCincoDeMayoHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 4))
        );

        $this->assertTrue(
            $usHoliday->getCincoDeMayoHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 5, 5))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertEquals('Cinco de Mayo', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCincoDeMayoHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
