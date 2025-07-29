<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Halloween
{
    /**
     * Setting Halloween
     *
     * @param int $year The year to get the holiday in
     */
    private function setHalloween(int $year)
    {
        return USHolidays::create($year, 10, 31, 0, 0, 0);
    }

    /**
     * Return object of Halloween for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getHalloweenHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Halloween', $year)[0];
    }
}
