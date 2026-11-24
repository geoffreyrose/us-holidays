<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait PalmSunday
{
    /**
     * Setting Palm Sunday
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setPalmSunDay(int $year): USHolidays
    {
        return $this->setEaster($year)->subWeeks(1);
    }

    /**
     * Return object of Palm Sunday for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getPalmSundayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Palm Sunday', $year)[0];
    }
}
