<?php

namespace Tests\Utilities;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class NextHolidayTest extends TestCase
{
    public function testNextHolidays()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertTrue(
            $usHoliday->getNextHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $usHoliday->getNextHolidays(2)[1]->date
                ->isSameDay(Carbon::createFromDate(2021, 2, 2))
        );

        $this->assertFalse(
            $usHoliday->getNextHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );
    }

    public function testNextHolidayName()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertEquals('Martin Luther King Jr. Day', $usHoliday->getNextHolidayName());
    }

    public function testNextHolidayDays()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertEquals(15, $usHoliday->getNextHolidayDays());
    }
}
