<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait CincoDeMayo
{
    /**
     * Setting Cinco de Mayo
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setCincoDeMayo(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 5, 5, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Cinco de Mayo for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getCincoDeMayoHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Cinco de Mayo', $year)[0];
    }
}
