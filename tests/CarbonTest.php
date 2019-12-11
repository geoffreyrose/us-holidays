<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class CarbonTest extends TestCase
{

    public function testGetHolidayYear()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday('2000')
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday(2000)
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );
    }

    public function testHolidayName()
    {
        // 07/04 - Saturday
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday()->subDay();

        $this->assertEquals("Independence Day (Observed)", $holiday->getHolidayName());

        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getIndependenceDayHoliday()->addDay();

        $this->assertEquals("Independence Day (Observed)", $holiday->getHolidayName());

    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        // 07/04 - Saturday
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->subDay()->isBankHoliday());

        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->addDay()->isBankHoliday());
    }

}
