<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait EarthDay
{
    /**
     * Setting Earth Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setEarthDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 4, 22, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Earth Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getEarthDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Earth Day', $year)[0];
    }
}
