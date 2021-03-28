<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait StPatricksDay
{
    /**
     * Setting St Patricks Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setStPatricksDay($year)
    {
        return Carbon::create($year, 3, 17, 0, 0, 0);
    }

    /**
     * Return object of St Patricks Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getStPatricksDayHoliday($year = null)
    {
        return $this->getHolidaysByYear("St. Patrick's Day", $year)[0];
    }
}
