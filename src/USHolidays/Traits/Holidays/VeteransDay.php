<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait VeteransDay
{
    /**
     * Setting Veterans Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setVeteransDay(int $year)
    {
        return USHolidays::create($year, 11, 11, 0, 0, 0);
    }

    /**
     * Return object of Veterans Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getVeteransDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Veterans Day', $year)[0];
    }
}
