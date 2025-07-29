<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait CincoDeMayo
{
    /**
     * Setting Cinco de Mayo
     *
     * @param int $year The year to get the holiday in
     */
    private function setCincoDeMayo(int $year)
    {
        return USHolidays::create($year, 5, 5, 0, 0, 0);
    }

    /**
     * Return object of Cinco de Mayo for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getCincoDeMayoHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Cinco de Mayo', $year)[0];
    }
}
