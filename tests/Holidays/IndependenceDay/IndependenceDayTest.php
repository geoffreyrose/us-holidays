<?php

namespace Tests\Holidays\IndependenceDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class IndependenceDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getIndependenceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 7, 3))
        );

        $this->assertTrue(
            $usHoliday->getIndependenceDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 7, 4))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertEquals('Independence Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2019, 1, 1)->getIndependenceDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2026, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2027, 1, 1)->getIndependenceDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
