<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait FlagDay
{
    /**
     * Setting Flag Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setFlagDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 6, 14, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Flag Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getFlagDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Flag Day', $year)[0];
    }
}
