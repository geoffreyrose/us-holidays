<?php

namespace Tests\Holidays\VeteransDay;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class VeteransDayTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getVeteransDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 12))
        );

        $this->assertTrue(
            $usHoliday->getVeteransDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 11))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertEquals('Veterans Day', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
