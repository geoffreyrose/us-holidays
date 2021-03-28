<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class BusinessDaysTest extends TestCase
{
    public function testIsBusinessDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 4);
        $this->assertTrue($carbon->isBusinessDay());

        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 3);
        $this->assertFalse($carbon->isBusinessDay());
    }

    public function testIsBusinessDayCustom()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 4);

        $carbon->setBusinessDays([4]);
        $this->assertFalse($carbon->isBusinessDay());

        $this->assertTrue($carbon->addDays(3)->isBusinessDay());
    }

    public function testNextBusinessDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 4);

        $this->assertTrue(
            $carbon->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 5))
        );

        $this->assertFalse(
            $carbon->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 4))
        );

        $carbon->setBusinessDays([4]);

        $this->assertTrue(
            $carbon->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $carbon->nextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 1, 6))
        );
    }

    public function testPrevBusinessDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 4);

        $this->assertTrue(
            $carbon->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $carbon->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 1))
        );

        $carbon->setBusinessDays([4]);

        $this->assertTrue(
            $carbon->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $this->assertFalse(
            $carbon->prevBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 3))
        );
    }

    public function testCurrentOrNextBusinessDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 4);

        $this->assertTrue(
            $carbon->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 4))
        );

        $this->assertFalse(
            $carbon->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 5))
        );

        $carbon->setBusinessDays([4]);

        $this->assertTrue(
            $carbon->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $carbon->currentOrNextBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 1, 6))
        );
    }

    public function testCurrentOrPrevBusinessDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 6);

        $this->assertTrue(
            $carbon->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 6))
        );

        $this->assertFalse(
            $carbon->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2020, 12, 31))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2021, 1, 7);
        $carbon->setBusinessDays([4]);

        $this->assertTrue(
            $carbon->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 7))
        );

        $this->assertFalse(
            $carbon->currentOrPreviousBusinessDay()
                ->isSameDay(Carbon::createFromDate(2021, 1, 3))
        );
    }

    public function testIsBankHolidayCustom() {
        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(Exception::class);
        $holiday->isBankHoliday();
    }

    public function testIsBankHolidayCustom2() {
        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(Exception::class);
        $holiday->addDay()->isBankHoliday();
    }
}
