<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait NewYearsEve
{
    /**
     * Setting New Years Eve
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setNewYearsEve(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 12, 31, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of New Years Eve for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getNewYearsEveHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("New Year's Eve", $year)[0];
    }
}
