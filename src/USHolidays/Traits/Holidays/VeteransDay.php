<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait VeteransDay
{
    /**
     * Setting Veterans Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setVeteransDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 11, 11, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Veterans Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getVeteransDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Veterans Day', $year)[0];
    }
}
