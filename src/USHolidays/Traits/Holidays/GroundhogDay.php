<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait GroundhogDay
{
    /**
     * Setting Groundhog Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setGroundhogDay(int $year)
    {
        return USHolidays::create($year, 2, 2, 0, 0, 0);
    }

    /**
     * Return object of Groundhog Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getGroundhogDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Groundhog Day', $year)[0];
    }
}
