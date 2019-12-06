<?php

use PHPUnit\Framework\TestCase;
use USHolidays\Carbon;

class CarbonTest extends TestCase
{
    public function testNewYearsDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 1, 2))
        );

        $this->assertTrue(
            $carbon->getNewYearsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 1, 1))
        );
    }

    public function testMLKDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getMLKDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 1, 16))
        );

        $this->assertTrue(
            $carbon->getMLKDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 1, 15))
        );
    }

    public function testGroundhogDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getGroundhogDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 3))
        );

        $this->assertTrue(
            $carbon->getGroundhogDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 2))
        );
    }

    public function testValentinesDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getValentinesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 13))
        );

        $this->assertTrue(
            $carbon->getValentinesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 14))
        );
    }

    public function testPresidentsDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getPresidentsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 1))
        );

        $this->assertTrue(
            $carbon->getPresidentsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 2, 19))
        );
    }

    public function testDaylightSavingStart()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getDaylightSavingStartHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 3, 10))
        );

        $this->assertTrue(
            $carbon->getDaylightSavingStartHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 3, 11))
        );
    }

    public function testStPatricksDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getStPatricksDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 3, 16))
        );

        $this->assertTrue(
            $carbon->getStPatricksDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 3, 17))
        );
    }

    public function testAprilFoolsDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getAprilFoolsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 2))
        );

        $this->assertTrue(
            $carbon->getAprilFoolsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 1))
        );
    }

    public function testTaxDayHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 15))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 17))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2019, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 4, 16))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 4, 15))
        );


        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 16))
        );

        $this->assertTrue(
            $carbon->getTaxDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 4, 15))
        );
    }

    public function testEarthDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getEarthDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 21))
        );

        $this->assertTrue(
            $carbon->getEarthDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 4, 22))
        );
    }

    public function testCincoDeMayo()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getCincoDeMayoHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 7))
        );

        $this->assertTrue(
            $carbon->getCincoDeMayoHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 5))
        );
    }

    public function testMothersDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getMothersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 12))
        );

        $this->assertTrue(
            $carbon->getMothersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 13))
        );
    }

    public function testArmedForcesDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getArmedForcesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 18))
        );

        $this->assertTrue(
            $carbon->getArmedForcesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 19))
        );
    }

    public function testMemorialDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 27))
        );

        $this->assertTrue(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 5, 28))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2019, 1, 1);

        $this->assertFalse(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 5, 26))
        );

        $this->assertTrue(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2019, 5, 27))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2020, 1, 1);

        $this->assertFalse(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 26))
        );

        $this->assertTrue(
            $carbon->getMemorialDayHoliday()
                ->isSameDay(Carbon::createFromDate(2020, 5, 25))
        );
    }

    public function testFlagsDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getFlagsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 13))
        );

        $this->assertTrue(
            $carbon->getFlagsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 14))
        );
    }

    public function testFathersDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getFathersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 18))
        );

        $this->assertTrue(
            $carbon->getFathersDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 17))
        );
    }

    public function testJuneteenth()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getJuneteenthHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 18))
        );

        $this->assertTrue(
            $carbon->getJuneteenthHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 6, 19))
        );
    }

    public function testIndependenceDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getIndependenceDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 7, 3))
        );

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 7, 4))
        );
    }

    public function testLaborDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getLaborDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 9, 4))
        );

        $this->assertTrue(
            $carbon->getLaborDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 9, 3))
        );
    }

    public function testPatriotsDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getPatriotsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 9, 10))
        );

        $this->assertTrue(
            $carbon->getPatriotsDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 9, 11))
        );
    }

    public function testColumbusDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getColumbusDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 10))
        );

        $this->assertTrue(
            $carbon->getColumbusDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 8))
        );

        $this->assertEquals('Christmas Day', Carbon::createFromDate(2010, 12, 25)->getHolidayName());
    }

    public function testIndigenousPeoplesDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getIndigenousPeoplesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 10))
        );

        $this->assertTrue(
            $carbon->getIndigenousPeoplesDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 8))
        );

        $this->assertEquals("Columbus Day, Indigenous Peoples' Day", Carbon::createFromDate(2018, 10, 8)->getHolidayName());
    }

    public function testHalloweenDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getHalloweenDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 30))
        );

        $this->assertTrue(
            $carbon->getHalloweenDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 10, 31))
        );
    }

    public function testDaylightSavingEnd()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getDaylightSavingEndHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 3))
        );

        $this->assertTrue(
            $carbon->getDaylightSavingEndHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 4))
        );
    }

    public function testVeteransDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getVeteransDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 10))
        );

        $this->assertTrue(
            $carbon->getVeteransDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 11))
        );
    }

    public function testThanksgiving()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 21))
        );

        $this->assertTrue(
            $carbon->getThanksgivingHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 22))
        );
    }

    public function testBlackFriday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getBlackFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 24))
        );

        $this->assertTrue(
            $carbon->getBlackFridayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 11, 23))
        );
    }

    public function testPearlHarborRemembrance()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getPearlHarborRemembranceHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 8))
        );

        $this->assertTrue(
            $carbon->getPearlHarborRemembranceHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 7))
        );
    }

    public function testChristmasEve()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getChristmasEveHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 25))
        );

        $this->assertTrue(
            $carbon->getChristmasEveHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 24))
        );
    }

    public function testChristmasDay()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getChristmasDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 26))
        );

        $this->assertTrue(
            $carbon->getChristmasDayHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 25))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 1, 1);

        $this->assertEquals('Christmas Day', Carbon::createFromDate(2016, 12, 25)->getHolidayName());
        $this->assertEquals('Christmas Day (Observed), Kwanzaa', Carbon::createFromDate(2016, 12, 26)->getHolidayName());


        $carbon = new Carbon();
        $carbon = Carbon::create(2010, 1, 1);

        $this->assertEquals('Christmas Day', Carbon::createFromDate(2010, 12, 25)->getHolidayName());
        $this->assertEquals('Christmas Eve, Christmas Day (Observed)', Carbon::createFromDate(2010, 12, 24)->getHolidayName());
    }

    public function testKwanzaa()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getKwanzaaHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 24))
        );

        $this->assertTrue(
            $carbon->getKwanzaaHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 26))
        );

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 1, 1);

        $this->assertTrue(
            $carbon->getKwanzaaHoliday()
                ->isSameDay(Carbon::createFromDate(2016, 12, 26))
        );
    }

    public function testNewYearsEve()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getNewYearsEveHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 30))
        );

        $this->assertTrue(
            $carbon->getNewYearsEveHoliday()
                ->isSameDay(Carbon::createFromDate(2018, 12, 31))
        );
    }

    public function testIsHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 2);

        $this->assertFalse( $carbon->isHoliday() );

        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertTrue( $carbon->isHoliday() );
    }

    public function testIsBankHoliday()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertTrue( $carbon->isBankHoliday() );

        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 4, 1);

        $this->assertFalse( $carbon->isBankHoliday() );

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 12, 26);
        $this->assertTrue( $carbon->isBankHoliday() );

        $carbon = new Carbon();
        $carbon = Carbon::create(2015, 7, 3);
        $this->assertTrue( $carbon->isBankHoliday() );
    }

    public function testGetHolidayYear()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 1);

        $this->assertFalse(
            $carbon->getIndependenceDayHoliday('2015')
                ->isSameDay(Carbon::createFromDate(2015, 7, 3))
        );

        $this->assertTrue(
            $carbon->getIndependenceDayHoliday('2000')
                ->isSameDay(Carbon::createFromDate(2000, 07, 4))
        );
    }

    public function testGetHolidayName()
    {
        $carbon = new Carbon();
        $carbon = Carbon::create(2018, 1, 2);

        $this->assertFalse($carbon->getHolidayName('2015'));

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 1, 1);
        $this->assertEquals('Independence Day', $carbon->getIndependenceDayHoliday()->getHolidayName());

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 1, 1);
        $this->assertEquals('Independence Day', $carbon->getIndependenceDayHoliday()->getHolidayName('asdasd'));


        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 4, 17);
        $this->assertEquals('Tax Day', $carbon->getHolidayName('2018'));

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 4, 17);
        $this->assertEquals('Tax Day', $carbon->getHolidayName(2018));

        $carbon = new Carbon();
        $carbon = Carbon::create(2016, 4, 15);
        $this->assertNotEquals('Tax Day', $carbon->getHolidayName(2018));
    }


}
