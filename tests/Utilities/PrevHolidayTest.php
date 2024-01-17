<?php

namespace Tests\Utilities;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class PrevHolidayTest extends TestCase
{
    public function testPrevHolidays()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertFalse(
            $usHoliday->getPrevHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $usHoliday->getPrevHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );

        $this->assertTrue(
            $usHoliday->getPrevHolidays(2)[1]->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );
    }

    public function testPrevHolidayName()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertEquals("New Year's Day", $usHoliday->getPrevHolidayName());

    }

    public function testPrevHolidayDays()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);

        $this->assertEquals(2, $usHoliday->getPrevHolidayDays());
    }
}
