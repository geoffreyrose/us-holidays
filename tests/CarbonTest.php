<?php

namespace Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class CarbonTest extends TestCase
{
    public function testGetHolidayYear()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2018, 1, 1);

        $this->assertTrue(
            $usHoliday->getIndependenceDayHoliday('2000')->date
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );

        $this->assertTrue(
            $usHoliday->getIndependenceDayHoliday(2000)->date
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );
    }

    public function testHolidayName()
    {
        // 07/04 - Saturday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date->subDay();

        $this->assertEquals('Independence Day (Observed)', $holiday->getHolidayName());

        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getIndependenceDayHoliday()->date->addDay();

        $this->assertEquals('Independence Day (Observed)', $holiday->getHolidayName());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 5);

        $this->assertEquals(null, $holiday->getHolidayName());

    }

    public function testGetHoliday()
    {
        // 07/04 - Saturday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertEquals('Independence Day', $holiday->getHoliday()[0]->name);
        $this->assertEquals($usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date, $holiday->getHoliday()[0]->date);

    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        // 07/04 - Saturday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertFalse($holiday->subDay()->isBankHoliday());

        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->addDay()->isBankHoliday());

        $usHoliday = $usHoliday->create(2016, 12, 25);
        $this->assertFalse($usHoliday->isBankHoliday());
        $this->assertTrue($usHoliday->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        // 07/04 - Saturday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isFederalHoliday());
        $this->assertTrue($holiday->subDay()->isFederalHoliday());

        // 07/04 - Sunday
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isFederalHoliday());
        $this->assertTrue($holiday->addDay()->isFederalHoliday());

        $usHoliday = $usHoliday->create(2016, 12, 25);
        $this->assertFalse($usHoliday->isFederalHoliday());
        $this->assertTrue($usHoliday->addDay()->isFederalHoliday());
    }

    public function testHolidayInDays()
    {
        $usHoliday = UsHoliday::create(2020, 1, 5);
        $holidays = $usHoliday->getHolidaysInDays(300, 'all');

        $this->assertFalse(count($holidays) == 3);
        $this->assertTrue(count($holidays) == 30);

        $usHoliday = UsHoliday::create(2020, 1, 5);
        $holidays = $usHoliday->getHolidaysInDays(360, ['Veterans Day', 'CHRISTMAS']);

        $this->assertFalse(count($holidays) == 1);
        $this->assertTrue(count($holidays) == 2);

        $usHoliday = UsHoliday::create(2020, 12, 22, 1, 0, 0);
        $holidays = $usHoliday->getHolidaysInDays(360, 'CHRISTMAS');

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);

        $usHoliday = UsHoliday::create(2020, 12, 22, 0, 0, 0);
        $holidays = $usHoliday->getHolidaysInDays(360, 'CHRISTMAS');

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);
    }

    public function testHolidayInYears()
    {
        $usHoliday = UsHoliday::create(2020, 1, 5);
        $holidays = $usHoliday->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 42);

        $usHoliday = $usHoliday->create(2020, 1, 5, 1, 0, 0);
        $holidays = $usHoliday->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 42);
    }

    public function testAddUserHoliday()
    {
        $usHoliday = UsHoliday::create(2020, 7, 14);
        $usHoliday->addHoliday([
            'name' => "Spongebob's Birthday",
            'date' => $usHoliday->create(1986, 7, 14),
            'bank_holiday' => false,
        ]);

        $this->assertEquals("Spongebob's Birthday", $usHoliday->getHolidayName());

        $usHoliday = UsHoliday::create(2020, 1, 1);
        $usHoliday->addHoliday([
            'name' => 'Q1 Tax Payments',
            'date' => function () use ($usHoliday) {
                $q1 = $usHoliday->create($usHoliday->year, 4, 15, 0, 0, 0);
                if ($q1->isBankHoliday()) {
                    $q1->addDay();

                    if ($q1->isWeekend()) {
                        $q1->next(UsHoliday::MONDAY);
                    }
                }

                if ($q1->isWeekend()) {
                    $q1->next(UsHoliday::MONDAY);
                }

                if ($q1 < $usHoliday->create(2020, 1, 15)) {
                    $q1 = $usHoliday->create($usHoliday->year + 1, 4, 15, 0, 0, 0);

                    if ($q1->isBankHoliday()) {
                        $q1->addDay();

                        if ($q1->isWeekend()) {
                            $q1->next(UsHoliday::MONDAY);
                        }
                    }

                    if ($q1->isWeekend()) {
                        $q1->next(UsHoliday::MONDAY);
                    }
                }

                if ($q1->isBankHoliday()) {
                    $q1->addDay();
                }

                return $q1;
            },
            'bank_holiday' => false,
        ]);

        $this->assertTrue(
            $usHoliday->getHolidaysByYear('Q1 Tax Payments')[0]->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 15))
        );

        $usHoliday = UsHoliday::create(2020, 7, 18);
        $usHoliday->addHoliday([
            'name' => "Patricks's Birthday",
            'date' => UsHoliday::create(1986, 7, 18),
            'bank_holiday' => true,
        ]);
        $this->assertFalse($usHoliday->isBankHoliday());
        $this->assertFalse($usHoliday->subDay()->isBankHoliday());
        //        $this->assertFalse($usHoliday->subDay()->isFederalHoliday());
    }

    public function testSetHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 7, 4);
        $usHoliday->setHolidays(['Christmas Day']);

        $this->assertFalse($usHoliday->isHoliday());

        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2021, 12, 25);
        $usHoliday->setHolidays(['Christmas Day']);

        $this->assertTrue($usHoliday->isHoliday());
    }

    public function testSetBankHolidays()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2022, 7, 4);
        $usHoliday->setBankHolidays(['April Fools']);

        $this->assertFalse($usHoliday->isBankHoliday());

        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2022, 4, 1);
        $usHoliday->setBankHolidays(['April Fools']);

        $this->assertTrue($usHoliday->isBankHoliday());
    }
}
