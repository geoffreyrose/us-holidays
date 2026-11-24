<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait IndependenceDay
{
    /**
     * Setting Independence Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setIndependenceDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 7, 4, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Independence Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getIndependenceDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Independence Day', $year)[0];
    }
}
