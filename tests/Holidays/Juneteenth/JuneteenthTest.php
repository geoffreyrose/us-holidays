<?php

namespace Tests\Holidays\Juneteenth;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class JuneteenthTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getJuneteenthHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 18))
        );

        $this->assertTrue(
            $usHoliday->getJuneteenthHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 6, 19))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertEquals('Juneteenth', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getJuneteenthHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2021, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2022, 1, 1)->getJuneteenthHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
