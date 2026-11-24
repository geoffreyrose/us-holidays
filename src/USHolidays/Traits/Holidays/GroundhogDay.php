<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait GroundhogDay
{
    /**
     * Setting Groundhog Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setGroundhogDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 2, 2, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Groundhog Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getGroundhogDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Groundhog Day', $year)[0];
    }
}
