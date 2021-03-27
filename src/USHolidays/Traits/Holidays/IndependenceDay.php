<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait IndependenceDay
{
    /**
     * Setting Independence Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setIndependenceDay($year)
    {
        return Carbon::create($year, 7, 4, 0, 0, 0);
    }

    /**
     * Return object of Independence Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getIndependenceDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Independence Day", $year)[0];
    }
}
