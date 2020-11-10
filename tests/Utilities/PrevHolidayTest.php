<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class PrevHolidayTest extends TestCase
{
    public function testPrevHolidays()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertFalse(
            $carbon->getPrevHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $carbon->getPrevHolidays()[0]->date
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );
    }

    public function testPrevHolidayName()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertEquals("New Year's Day", $carbon->getPrevHolidayName());

    }

    public function testPrevHolidayDays()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);

        $this->assertEquals(2, $carbon->getPrevHolidayDays());
    }
}
