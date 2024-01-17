<?php

namespace Tests\Holidays\RoshHashanah;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class RoshHashanahTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getRoshHashanahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 18))
        );

        $this->assertTrue(
            $usHoliday->getRoshHashanahHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 9, 19))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertEquals('Rosh Hashanah', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getRoshHashanahHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
