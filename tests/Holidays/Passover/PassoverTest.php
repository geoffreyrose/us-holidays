<?php

namespace Tests\Holidays\Passover;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PassoverTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getPassoverHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 8))
        );

        $this->assertTrue(
            $usHoliday->getPassoverHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 9))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPassoverHoliday();

        $this->assertEquals('Passover', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPassoverHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPassoverHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPassoverHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
