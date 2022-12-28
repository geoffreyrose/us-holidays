<?php

namespace Tests\Holidays\VeteransDay;

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class VeteransDayTest extends TestCase
{
    public function testHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getVeteransDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 12))
        );

        $this->assertTrue(
            $carbon->getVeteransDayHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 11, 11))
        );
    }

    public function testHolidayName()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertEquals("Veterans Day", $holiday->name);
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertFalse($holiday->date->subDay()->isBankHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
        $this->assertTrue($holiday->date->addDay()->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $carbon = new Carbon();
        $holiday = Carbon::create(2020, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2023, 1, 1)->getVeteransDayHoliday();

        $this->assertTrue($holiday->date->subDay()->isFederalHoliday());

        $carbon = new Carbon();
        $holiday = Carbon::create(2029, 1, 1)->getVeteransDayHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
        $this->assertTrue($holiday->date->addDay()->isFederalHoliday());
    }
}
