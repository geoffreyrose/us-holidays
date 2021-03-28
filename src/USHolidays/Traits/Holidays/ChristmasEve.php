<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait ChristmasEve
{
    /**
     * Setting Christmas Eve
     *
     * @param int $year The year to get the holiday in
     */
    private function setChristmasEve($year)
    {
        return Carbon::create($year, 12, 24, 0, 0, 0);
    }

    /**
     * Return object of Christmas Eve for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getChristmasEveHoliday($year = null)
    {
        return $this->getHolidaysByYear("Christmas Eve", $year)[0];
    }
}
