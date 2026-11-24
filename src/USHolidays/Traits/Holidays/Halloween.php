<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Halloween
{
    /**
     * Setting Halloween
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setHalloween(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 10, 31, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Halloween for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getHalloweenHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Halloween', $year)[0];
    }
}
