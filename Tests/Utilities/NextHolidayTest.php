<?php

namespace Tests\Utilities;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class NextHolidayTest extends TestCase
{
    public function test_next_holidays()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertTrue(
            $holidays->getNextHolidays()[0]->date
                ->isSameDay(USHolidays::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $holidays->getNextHolidays(2)[1]->date
                ->isSameDay(USHolidays::createFromDate(2021, 2, 2))
        );

        $this->assertFalse(
            $holidays->getNextHolidays()[0]->date
                ->isSameDay(USHolidays::createFromDate(2021, 1, 1))
        );
    }

    public function test_next_holiday_name()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertEquals('Martin Luther King Jr. Day', $holidays->getNextHolidayName());
    }

    public function test_next_holiday_days()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertEquals(15, $holidays->getNextHolidayDays());
    }
}
