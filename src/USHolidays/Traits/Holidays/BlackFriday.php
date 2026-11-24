<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait BlackFriday
{
    /**
     * Setting Black Friday
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setBlackFriDay(int $year): USHolidays
    {
        return $this->setThanksgiving($year)->addDay();
    }

    /**
     * Return object of Black Friday for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getBlackFridayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Black Friday', $year)[0];
    }
}
