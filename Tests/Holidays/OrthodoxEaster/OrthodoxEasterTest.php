<?php

namespace Tests\Holidays\OrthodoxEaster;

use PHPUnit\Framework\TestCase;
use USHolidays\USHolidays;

class OrthodoxEasterTest extends TestCase
{
    public function test_holiday()
    {

        $holidays = USHolidays::create(2020, 1, 1);

        $this->assertFalse(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 18))
        );

        $this->assertTrue(
            $holidays->getOrthodoxEasterHoliday()->date
                ->isSameDay(USHolidays::createFromDate(2020, 4, 19))
        );
    }

    public function test_holiday_outside_1900_to_2099()
    {
        // The Julian calendar is 12 days behind in 1800-1899 and 14 days from March 2100
        $expected = [
            1850 => [5, 5],
            1899 => [4, 30],
            2099 => [4, 12],
            2100 => [5, 2],
            2101 => [4, 24],
            2200 => [4, 6],
        ];

        foreach ($expected as $year => [$month, $day]) {
            $date = USHolidays::create($year, 1, 1)->getOrthodoxEasterHoliday()->date;

            $this->assertSame(sprintf('%d-%02d-%02d', $year, $month, $day), $date->format('Y-m-d'));
            $this->assertTrue($date->isSunday());
        }
    }

    public function test_holiday_name()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertEquals('Orthodox Easter', $holiday->name);
    }

    public function test_is_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function test_is_bank_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function test_is_federal_holiday()
    {

        $holiday = USHolidays::create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
