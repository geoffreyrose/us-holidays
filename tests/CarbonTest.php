<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class CarbonTest extends TestCase
{
    public function testThanksgiving()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 21))
        );

        $this->assertTrue(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 22))
        );
    }

    public function testDayAfterThanksgiving()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2019, 1, 1);

        $this->assertFalse(
            $carbon->getDayAfterThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 11, 30))
        );

        $this->assertTrue(
            $carbon->getDayAfterThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 11, 29))
        );
    }
}
