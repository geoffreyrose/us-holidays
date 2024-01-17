<?php

namespace Tests\Holidays\Thanksgiving;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ThanksgivingTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getThanksgivingHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 25))
        );

        $this->assertTrue(
            $usHoliday->getThanksgivingHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 26))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertEquals('Thanksgiving', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getThanksgivingHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());
    }
}
