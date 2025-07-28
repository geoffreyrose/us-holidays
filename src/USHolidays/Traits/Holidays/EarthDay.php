<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait EarthDay
{
    /**
     * Setting Earth Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setEarthDay(int $year)
    {
        return USHolidays::create($year, 4, 22, 0, 0, 0);
    }

    /**
     * Return object of Earth Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getEarthDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Earth Day', $year)[0];
    }
}
