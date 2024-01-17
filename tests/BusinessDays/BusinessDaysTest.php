<?php

namespace Tests\BusinessDays;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class BusinessDaysTest extends TestCase
{
    public function testIsBusinessDay()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 4);
        $this->assertTrue($usHoliday->isBusinessDay());

        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 3);
        $this->assertFalse($usHoliday->isBusinessDay());
    }

    public function testIsBusinessDayCustom()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 4);

        $usHoliday->setBusinessDays([4]);
        $this->assertFalse($usHoliday->isBusinessDay());

        $this->assertTrue($usHoliday->addDays(3)->isBusinessDay());
    }

    public function testNextBusinessDay()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 4);

        $this->assertTrue(
            $usHoliday->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 5))
        );

        $this->assertFalse(
            $usHoliday->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 4))
        );

        $usHoliday->setBusinessDays([4]);

        $this->assertTrue(
            $usHoliday->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $usHoliday->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 1, 6))
        );
    }

    public function testPrevBusinessDay()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 4);

        $this->assertTrue(
            $usHoliday->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $usHoliday->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );

        $usHoliday->setBusinessDays([4]);

        $this->assertTrue(
            $usHoliday->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $usHoliday->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 3))
        );
    }

    public function testCurrentOrNextBusinessDay()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 4);

        $this->assertTrue(
            $usHoliday->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 4))
        );

        $this->assertFalse(
            $usHoliday->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 5))
        );

        $usHoliday->setBusinessDays([4]);

        $this->assertTrue(
            $usHoliday->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $usHoliday->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 1, 6))
        );
    }

    public function testCurrentOrPrevBusinessDay()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 6);

        $this->assertTrue(
            $usHoliday->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 6))
        );

        $this->assertFalse(
            $usHoliday->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 1, 7);
        $usHoliday->setBusinessDays([4]);

        $this->assertTrue(
            $usHoliday->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $usHoliday->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 3))
        );
    }

    public function testIsBankHolidayCustom()
    {
        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isBankHoliday();
    }

    public function testIsBankHolidayCustom2()
    {
        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isBankHoliday();
    }

    public function testIsFederalHolidayCustom()
    {
        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isFederalHoliday();
    }

    public function testIsFederalHolidayCustom2()
    {
        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isFederalHoliday();
    }
}
