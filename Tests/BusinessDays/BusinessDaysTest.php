<?php

namespace Tests\BusinessDays;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class BusinessDaysTest extends TestCase
{
    public function test_is_business_day()
    {

        $holidays = USHolidays::create(2021, 1, 4);
        $this->assertTrue($holidays->isBusinessDay());

        $holidays = USHolidays::create(2021, 1, 3);
        $this->assertFalse($holidays->isBusinessDay());
    }

    public function test_is_business_day_custom()
    {

        $holidays = USHolidays::create(2021, 1, 4);

        $holidays->setBusinessDays([4]);
        $this->assertFalse($holidays->isBusinessDay());

        $this->assertTrue($holidays->addDays(3)->isBusinessDay());
    }

    public function test_next_business_day()
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

    public function test_prev_business_day()
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

    public function test_current_or_next_business_day()
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

    public function test_current_or_prev_business_day()
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

    public function test_is_bank_holiday_custom()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isBankHoliday();
    }

    public function test_is_bank_holiday_custom2()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isBankHoliday();
    }

    public function test_is_federal_holiday_custom()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;
        $holiday->setBusinessDays([4]);

        $this->expectException(\Exception::class);
        $holiday->isFederalHoliday();
    }

    public function test_is_federal_holiday_custom2()
    {
        // 07/04 - Sunday

        $holiday = USHolidays::create(2022, 7, 4);
        $holiday->setBusinessDays([1]);

        $this->expectException(\Exception::class);
        $holiday->addDay()->isFederalHoliday();
    }
}
