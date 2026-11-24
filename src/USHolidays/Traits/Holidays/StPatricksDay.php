<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait StPatricksDay
{
    /**
     * Setting St Patricks Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setStPatricksDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 3, 17, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of St Patricks Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getStPatricksDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("St. Patrick's Day", $year)[0];
    }
}
