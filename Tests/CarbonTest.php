<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class CarbonTest extends TestCase
{
    public function testGetHolidayYear()
    {

        $holidays = USHolidays::create(2018, 1, 1);

        $this->assertTrue(
            $holidays->getIndependenceDayHoliday('2000')->date
                ->isSameDay(USHolidays::createFromDate(2000, 07, 4))
        );

        $this->assertTrue(
            $holidays->getIndependenceDayHoliday(2000)->date
                ->isSameDay(USHolidays::createFromDate(2000, 07, 4))
        );
    }

    public function testHolidayName()
    {
        // 07/04 - Saturday

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date->subDay();

        $this->assertEquals('Independence Day (Observed)', $holiday->getHolidayName());

        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date->addDay();

        $this->assertEquals('Independence Day (Observed)', $holiday->getHolidayName());

        $holiday = USHolidays::create(2021, 1, 5);

        $this->assertEquals(null, $holiday->getHolidayName());

    }

    public function testGetHoliday()
    {
        // 07/04 - Saturday

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertEquals('Independence Day', $holiday->getHoliday()[0]->name);
        $this->assertEquals(USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date, $holiday->getHoliday()[0]->date);

    }

    public function testIsHoliday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        // 07/04 - Saturday

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertFalse($holiday->subDay()->isBankHoliday());

        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->addDay()->isBankHoliday());

        $holidays = USHolidays::create(2016, 12, 25);
        $this->assertFalse($holidays->isBankHoliday());
        $this->assertTrue($holidays->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        // 07/04 - Saturday

        $holiday = USHolidays::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isFederalHoliday());
        $this->assertTrue($holiday->subDay()->isFederalHoliday());

        // 07/04 - Sunday

        $holiday = USHolidays::create(2021, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isFederalHoliday());
        $this->assertTrue($holiday->addDay()->isFederalHoliday());

        $holidays = USHolidays::create(2016, 12, 25);
        $this->assertFalse($holidays->isFederalHoliday());
        $this->assertTrue($holidays->addDay()->isFederalHoliday());
    }

    public function testHolidayInDays()
    {
        $holidays = USHolidays::create(2020, 1, 5);
        $holidays = $holidays->getHolidaysInDays(300, 'all');

        $this->assertFalse(count($holidays) == 3);
        $this->assertTrue(count($holidays) == 30);

        $holidays = USHolidays::create(2020, 1, 5);
        $holidays = $holidays->getHolidaysInDays(360, ['Veterans Day', 'CHRISTMAS']);

        $this->assertFalse(count($holidays) == 1);
        $this->assertTrue(count($holidays) == 2);

        $holidays = USHolidays::create(2020, 12, 22, 1, 0, 0);
        $holidays = $holidays->getHolidaysInDays(360, 'CHRISTMAS');

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);

        $holidays = USHolidays::create(2020, 12, 22, 0, 0, 0);
        $holidays = $holidays->getHolidaysInDays(360, 'CHRISTMAS');

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);
    }

    public function testHolidayInYears()
    {
        $holidays = USHolidays::create(2020, 1, 5);
        $holidays = $holidays->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 42);

        $holidays = USHolidays::create(2020, 1, 5, 1, 0, 0);
        $holidays = $holidays->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 42);
    }

    public function testAddUserHoliday()
    {
        $holidays = USHolidays::create(2020, 7, 14);
        $holidays->addHoliday([
            'name' => "Spongebob's Birthday",
            'date' => USHolidays::create(1986, 7, 14),
            'bank_holiday' => false,
        ]);

        $this->assertEquals("Spongebob's Birthday", $holidays->getHolidayName());

        $holidays = USHolidays::create(2020, 1, 1);
        $holidays->addHoliday([
            'name' => 'Q1 Tax Payments',
            'date' => function () use ($holidays) {
                $q1 = USHolidays::create($holidays->year, 4, 15, 0, 0, 0);
                if ($q1->isBankHoliday()) {
                    $q1->addDay();

                    if ($q1->isWeekend()) {
                        $q1->next(USHolidays::MONDAY);
                    }
                }

                if ($q1->isWeekend()) {
                    $q1->next(USHolidays::MONDAY);
                }

                if ($q1 < USHolidays::create(2020, 1, 15)) {
                    $q1 = USHolidays::create($holidays->year + 1, 4, 15, 0, 0, 0);

                    if ($q1->isBankHoliday()) {
                        $q1->addDay();

                        if ($q1->isWeekend()) {
                            $q1->next(USHolidays::MONDAY);
                        }
                    }

                    if ($q1->isWeekend()) {
                        $q1->next(USHolidays::MONDAY);
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
            $holidays->getHolidaysByYear('Q1 Tax Payments')[0]->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 15))
        );

        $holidays = USHolidays::create(2020, 7, 18);
        $holidays->addHoliday([
            'name' => "Patricks's Birthday",
            'date' => USHolidays::create(1986, 7, 18),
            'bank_holiday' => true,
        ]);
        $this->assertFalse($holidays->isBankHoliday());
        $this->assertFalse($holidays->subDay()->isBankHoliday());
        //        $this->assertFalse($holidays->subDay()->isFederalHoliday());
    }

    public function testSetHoliday()
    {

        $holidays = USHolidays::create(2021, 7, 4);
        $holidays->setHolidays(['Christmas Day']);

        $this->assertFalse($holidays->isHoliday());

        $holidays = USHolidays::create(2021, 12, 25);
        $holidays->setHolidays(['Christmas Day']);

        $this->assertTrue($holidays->isHoliday());
    }

    public function testSetBankHolidays()
    {

        $holidays = USHolidays::create(2022, 7, 4);
        $holidays->setBankHolidays(['April Fools']);

        $this->assertFalse($holidays->isBankHoliday());

        $holidays = USHolidays::create(2022, 4, 1);
        $holidays->setBankHolidays(['April Fools']);

        $this->assertTrue($holidays->isBankHoliday());
    }
}
