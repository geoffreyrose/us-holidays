<?php

namespace Tests\Holidays\Kwanzaa;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class KwanzaaTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getKwanzaaHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 25))
        );

        $this->assertTrue(
            $usHoliday->getKwanzaaHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 12, 26))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertEquals('Kwanzaa', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getKwanzaaHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
