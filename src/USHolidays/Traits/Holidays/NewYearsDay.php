<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait NewYearsDay
{
    /**
     * Setting NewY ears Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setNewYearsDay(int $year)
    {
        return USHolidays::create($year, 1, 1, 0, 0, 0);
    }

    /**
     * Return object of New Years Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getNewYearsDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear("New Year's Day", $year)[0];
    }
}
