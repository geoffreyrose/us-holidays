<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait PatriotsDay
{
    /**
     * Setting Patriots Day
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setPatriotsDay(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 9, 11, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Patriot Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getPatriotDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Patriot Day', $year)[0];
    }
}
