<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait FlagDay
{
    /**
     * Setting Flag Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setFlagDay(int $year)
    {
        return USHolidays::create($year, 6, 14, 0, 0, 0);
    }

    /**
     * Return object of Flag Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getFlagDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Flag Day', $year)[0];
    }
}
