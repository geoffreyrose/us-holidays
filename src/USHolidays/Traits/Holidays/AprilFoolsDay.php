<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait AprilFoolsDay
{
    /**
     * Setting April Fools Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setAprilFoolsDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 4, 1, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of April Fools Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getAprilFoolsDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear("April Fools' Day", $year)[0];
    }
}
