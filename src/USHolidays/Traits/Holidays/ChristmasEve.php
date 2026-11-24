<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait ChristmasEve
{
    /**
     * Setting Christmas Eve
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setChristmasEve(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 12, 24, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Christmas Eve for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getChristmasEveHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Christmas Eve', $year)[0];
    }
}
