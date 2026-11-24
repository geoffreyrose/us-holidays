<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait ChristmasDay
{
    /**
     * Setting Christmas Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setChristmasDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 12, 25, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Christmas Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getChristmasDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Christmas Day', $year)[0];
    }
}
