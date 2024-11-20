<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait ChristmasEve
{
    /**
     * Setting Christmas Eve
     *
     * @param int $year The year to get the holiday in
     */
    private function setChristmasEve(int $year)
    {
        return USHolidays::create($year, 12, 24, 0, 0, 0);
    }

    /**
     * Return object of Christmas Eve for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getChristmasEveHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Christmas Eve', $year)[0];
    }
}
