<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class NextHolidayTest extends TestCase
{
    public function testNextHolidays()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertTrue(
            $carbon->getNextHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $carbon->getNextHolidays(2)[1]->date
                ->isSameDay(Carbon::createFromDate(2021, 2, 2))
        );

        $this->assertFalse(
            $carbon->getNextHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );
    }

    public function testNextHolidayName()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertEquals("Martin Luther King Jr. Day", $carbon->getNextHolidayName());
    }

    public function testNextHolidayDays()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertEquals(15, $carbon->getNextHolidayDays());
    }
}
