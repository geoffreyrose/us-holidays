<?php

namespace Tests\Utilities;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class PrevHolidayTest extends TestCase
{
    public function testPrevHolidays()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertFalse(
            $holidays->getPrevHolidays()[0]->date
                ->isSameDay(USHolidays::createFromDate(2021, 1, 18))
        );

        $this->assertTrue(
            $holidays->getPrevHolidays()[0]->date
                ->isSameDay(USHolidays::createFromDate(2021, 1, 1))
        );

        $this->assertTrue(
            $holidays->getPrevHolidays(2)[1]->date
                ->isSameDay(USHolidays::createFromDate(2020, 12, 31))
        );
    }

    public function testPrevHolidayName()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertEquals("New Year's Day", $holidays->getPrevHolidayName());

    }

    public function testPrevHolidayDays()
    {

        $holidays = USHolidays::create(2021, 1, 3);

        $this->assertEquals(2, $holidays->getPrevHolidayDays());
    }
}
