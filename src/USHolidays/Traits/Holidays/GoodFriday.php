<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait GoodFriday
{
    /**
     * Setting Good Friday
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setGoodFriDay(int $year): USHolidays
    {
        return $this->setEaster($year)->subDays(2);
    }

    /**
     * Return object of Good Friday for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getGoodFridayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Good Friday', $year)[0];
    }
}
