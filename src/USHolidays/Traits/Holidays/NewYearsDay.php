<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait NewYearsDay
{
    /**
     * Setting NewY ears Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setNewYearsDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 1, 1, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of New Years Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getNewYearsDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("New Year's Day", $year)[0];
    }
}
