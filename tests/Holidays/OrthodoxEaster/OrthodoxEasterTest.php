<?php

namespace Tests\Holidays\OrthodoxEaster;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use USHolidays\UsHoliday;

class OrthodoxEasterTest extends TestCase
{
    public function testHoliday()
    {
        $usHoliday = new UsHoliday();
        $usHoliday = $usHoliday->create(2020, 1, 1);

        $this->assertFalse(
            $usHoliday->getOrthodoxEasterHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 18))
        );

        $this->assertTrue(
            $usHoliday->getOrthodoxEasterHoliday()->date
                ->isSameDay(Carbon::createFromDate(2020, 4, 19))
        );
    }

    public function testHolidayName()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertEquals('Orthodox Easter', $holiday->name);
    }

    public function testIsHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertTrue($holiday->date->isHoliday());
    }

    public function testIsBankHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isBankHoliday());
    }

    public function testIsFederalHoliday()
    {
        $usHoliday = new UsHoliday();
        $holiday = $usHoliday->create(2020, 1, 1)->getOrthodoxEasterHoliday();

        $this->assertFalse($holiday->date->isFederalHoliday());
    }
}
