<?php

namespace Tests\Holidays\ValentinesDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ValentinesDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getValentinesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 15))
        );

        $this->assertTrue(
            $usHoliday->getValentinesDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 2, 14))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertEquals("Valentine's Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getValentinesDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
