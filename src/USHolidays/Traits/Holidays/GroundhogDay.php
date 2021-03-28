<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait GroundhogDay
{
    /**
     * Setting Groundhog Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setGroundhogDay($year)
    {
        return Carbon::create($year, 2, 2, 0, 0, 0);
    }

    /**
     * Return object of Groundhog Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getGroundhogDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("Groundhog Day", $year)[0];
    }
}
