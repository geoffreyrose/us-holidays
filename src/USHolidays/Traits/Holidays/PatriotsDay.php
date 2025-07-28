<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait PatriotsDay
{
    /**
     * Setting Patriots Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setPatriotsDay(int $year)
    {
        return USHolidays::create($year, 9, 11, 0, 0, 0);
    }

    /**
     * Return object of Patriot Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPatriotDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Patriot Day', $year)[0];
    }
}
