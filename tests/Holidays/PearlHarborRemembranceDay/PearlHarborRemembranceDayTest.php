<?php

namespace Tests\Holidays\PearlHarborRemembranceDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PearlHarborRemembranceDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 6))
        );

        $this->assertTrue(
            $usHoliday->getPearlHarborRemembranceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 7))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertEquals('Pearl Harbor Remembrance Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getPearlHarborRemembranceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
