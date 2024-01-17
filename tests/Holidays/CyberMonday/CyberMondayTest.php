<?php

namespace Tests\Holidays\CyberMonday;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class CyberMondayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2022, 1, 1);

        $this->assertFalse(
            $usHoliday->getCyberMondayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2022, 11, 21))
        );

        $this->assertTrue(
            $usHoliday->getCyberMondayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2022, 11, 28))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertEquals('Cyber Monday', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getCyberMondayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
