<?php

namespace Tests\Holidays\AshWednesday;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class AshWednesdayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getAshWednesdayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 24))
        );

        $this->assertTrue(
            $usHoliday->getAshWednesdayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 26))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertEquals('Ash Wednesday', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getAshWednesdayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
