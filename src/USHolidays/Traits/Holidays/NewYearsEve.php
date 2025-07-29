<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait NewYearsEve
{
    /**
     * Setting New Years Eve
     *
     * @param int $year The year to get the holiday in
     */
    private function setNewYearsEve(int $year)
    {
        return USHolidays::create($year, 12, 31, 0, 0, 0);
    }

    /**
     * Return object of New Years Eve for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getNewYearsEveHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear("New Year's Eve", $year)[0];
    }
}
