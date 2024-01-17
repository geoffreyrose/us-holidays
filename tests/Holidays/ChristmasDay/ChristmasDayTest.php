<?php

namespace Tests\Holidays\ChristmasDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class ChristmasDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getChristmasDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 24))
        );

        $this->assertTrue(
            $usHoliday->getChristmasDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertEquals('Christmas Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getChristmasDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getChristmasDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
