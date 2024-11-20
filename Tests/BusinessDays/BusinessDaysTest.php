<?php

namespace Tests\BusinessDays;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class BusinessDaysTest extends TestCase
{
    public function testIsBusinessDay()
    {

        $holidays = USHolidays::create(2021, 1, 4);
        $this->assertTrue($holidays->isBusinessDay());

        $holidays = USHolidays::create(2021, 1, 3);
        $this->assertFalse($holidays->isBusinessDay());
    }

    public function testIsBusinessDayCustom()
    {

        $holidays = USHolidays::create(2021, 1, 4);

        $holidays->setBusinessDays([4]);
        $this->assertFalse($holidays->isBusinessDay());

        $this->assertTrue($holidays->addDays(3)->isBusinessDay());
    }

    public function testNextBusinessDay()
    {

        $holidays = USHolidays::create(2021, 1, 4);

        $this->assertTrue(
            $holidays->nextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 5))
        );

        $this->assertFalse(
            $holidays->nextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 4))
        );

        $holidays->setBusinessDays([4]);

        $this->assertTrue(
            $holidays->nextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $holidays->nextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2020, 1, 6))
        );
    }

    public function testPrevBusinessDay()
    {

        $holidays = USHolidays::create(2021, 1, 4);

        $this->assertTrue(
            $holidays->prevBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $holidays->prevBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 1))
        );

        $holidays->setBusinessDays([4]);

        $this->assertTrue(
            $holidays->prevBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $holidays->prevBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 3))
        );
    }

    public function testCurrentOrNextBusinessDay()
    {

        $holidays = USHolidays::create(2021, 1, 4);

        $this->assertTrue(
            $holidays->currentOrNextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 4))
        );

        $this->assertFalse(
            $holidays->currentOrNextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 5))
        );

        $holidays->setBusinessDays([4]);

        $this->assertTrue(
            $holidays->currentOrNextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $holidays->currentOrNextBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2020, 1, 6))
        );
    }

    public function testCurrentOrPrevBusinessDay()
    {

        $holidays = USHolidays::create(2021, 1, 6);

        $this->assertTrue(
            $holidays->currentOrPreviousBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 6))
        );

        $this->assertFalse(
            $holidays->currentOrPreviousBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2020, 12, 31))
        );

        $holidays = USHolidays::create(2021, 1, 7);
        $holidays->setBusinessDays([4]);

        $this->assertTrue(
            $holidays->currentOrPreviousBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $holidays->currentOrPreviousBusinessDay()
                ->isSameDay(USHolidays::createFromDate(2021, 1, 3))
        );
    }

    public function testIsBankHolidayCustom()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isBankHoliday();
    }

    public function testIsBankHolidayCustom2()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isBankHoliday();
    }

    public function testIsFederalHolidayCustom()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isFederalHoliday();
    }

    public function testIsFederalHolidayCustom2()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isFederalHoliday();
    }
}
