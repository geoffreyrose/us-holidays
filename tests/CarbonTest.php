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
            $carbon->getIndependenceDayHoliday('2000')->date
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday(2000)->date
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );
    }

    public function testHolidayName()
    {
        // 07/04 - Saturday
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday()->date->subDay();

        $this->assertEquals("Independence Day (Observed)", $holiday->getHolidayName());

        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getIndependenceDayHoliday()->date->addDay();

        $this->assertEquals("Independence Day (Observed)", $holiday->getHolidayName());

    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertTrue($holiday->isHoliday());
    }

    public function testIsBankHoliday()
    {
        // 07/04 - Saturday
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->subDay()->isBankHoliday());

        // 07/04 - Sunday
        $carbon = new Carbon();
        $holiday = Carbon::create(2021, 1, 1)->getIndependenceDayHoliday()->date;

        $this->assertFalse($holiday->isBankHoliday());
        $this->assertTrue($holiday->addDay()->isBankHoliday());

        $carbon = Carbon::create(2016, 12, 25);
        $this->assertFalse($carbon->isBankHoliday());
        $this->assertTrue($carbon->addDay()->isBankHoliday());
    }

    public function testHolidayInDays()
    {
        $carbon = Carbon::create(2020, 1, 5);
        $holidays = $carbon->getHolidaysInDays(300, 'all');

        $this->assertFalse(count($holidays) == 3);
        $this->assertTrue(count($holidays) == 30);

        $carbon = Carbon::create(2020, 1, 5);
        $holidays = $carbon->getHolidaysInDays(360, ["Veterans Day", "CHRISTMAS"]);

        $this->assertFalse(count($holidays) == 1);
        $this->assertTrue(count($holidays) == 2);

        $carbon = Carbon::create(2020, 12, 22, 1, 0, 0);
        $holidays = $carbon->getHolidaysInDays(360, "CHRISTMAS");

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);

        $carbon = Carbon::create(2020, 12, 22, 0, 0, 0);
        $holidays = $carbon->getHolidaysInDays(360, "CHRISTMAS");

        $this->assertFalse(count($holidays) == 0);
        $this->assertTrue(count($holidays) == 1 && $holidays[0]->days_away == 3);
    }

    public function testHolidayInYears()
    {
        $carbon = Carbon::create(2020, 1, 5);
        $holidays = $carbon->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 41);

        $carbon = Carbon::create(2020, 1, 5, 1, 0, 0);
        $holidays = $carbon->getHolidaysInYears(1, 'all');

        $this->assertFalse(count($holidays) == 40);
        $this->assertTrue(count($holidays) == 41);
    }

    public function testAddUserHoliday()
    {
        $carbon = Carbon::create(2020, 7, 14);
        $carbon->addHoliday([
            'name' => "Spongebob's Birthday",
            'date' => Carbon::create(1986, 7, 14),
            'bank_holiday' => false
        ]);

        $this->assertEquals("Spongebob's Birthday", $carbon->getHolidayName());

        $carbon = Carbon::create(2020, 1, 1);
        $carbon->addHoliday([
            'name' => "Q1 Tax Payments",
            'date' => function() use($carbon) {
                $q1 = Carbon::create($carbon->year, 4, 15, 0, 0, 0);
                if($q1->isBankHoliday()) {
                    $q1->addDay();

                    if($q1->isWeekend()) {
                        $q1->next(Carbon::MONDAY);
                    }
                }

                if($q1->isWeekend()) {
                    $q1->next(Carbon::MONDAY);
                }

                if($q1 < Carbon::now()) {
                    $q1 = Carbon::create($carbon->year + 1, 4, 15, 0, 0, 0);

                    if($q1->isBankHoliday()) {
                        $q1->addDay();

                        if($q1->isWeekend()) {
                            $q1->next(Carbon::MONDAY);
                        }
                    }

                    if($q1->isWeekend()) {
                        $q1->next(Carbon::MONDAY);
                    }
                }

                if($q1->isBankHoliday()) {
                    $q1->addDay();
                }

                return $q1;
            },
            'bank_holiday' => false
        ]);

        $this->assertTrue(
            $carbon->getHolidaysByYear('Q1 Tax Payments')[0]->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 15))
        );


        $carbon = Carbon::create(2020, 7, 18);
        $carbon->addHoliday([
            'name' => "Patricks's Birthday",
            'date' => Carbon::create(1986, 7, 18),
            'bank_holiday' => true
        ]);
        $this->assertFalse($carbon->isBankHoliday());
        $this->assertTrue($carbon->subDay()->isBankHoliday());
    }

}
