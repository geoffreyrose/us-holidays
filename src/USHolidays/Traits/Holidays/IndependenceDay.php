<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait IndependenceDay
{
    /**
     * Setting Independence Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setIndependenceDay(int $year)
    {
        return USHolidays::create($year, 7, 4, 0, 0, 0);
    }

    /**
     * Return object of Independence Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getIndependenceDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Independence Day', $year)[0];
    }
}
