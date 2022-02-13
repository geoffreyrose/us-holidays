<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait AprilFoolsDay
{
    /**
     * Setting April Fools Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setAprilFoolsDay($year)
    {
        return Carbon::create($year, 4, 1, 0, 0, 0);
    }

    /**
      * Return object of April Fools Day for given year
      *
      * @param int|null $year The year to get the holiday in
      */
    public function getAprilFoolsDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("April Fools' Day", $year)[0];
    }
}
