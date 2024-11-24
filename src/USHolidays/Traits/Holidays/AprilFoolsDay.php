<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait AprilFoolsDay
{
    /**
     * Setting April Fools Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setAprilFoolsDay(int $year)
    {
        return USHolidays::create($year, 4, 1, 0, 0, 0);
    }

    /**
     * Return object of April Fools Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getAprilFoolsDayHoliday(int $year = null)
    {
        return $this->getHolidaysByYear("April Fools' Day", $year)[0];
    }
}
