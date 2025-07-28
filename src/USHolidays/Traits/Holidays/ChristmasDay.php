<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait ChristmasDay
{
    /**
     * Setting Christmas Day
     *
     * @param int $year The year to get the holiday in
     */
    private function setChristmasDay(int $year)
    {
        return USHolidays::create($year, 12, 25, 0, 0, 0);
    }

    /**
     * Return object of Christmas Day for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getChristmasDayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Christmas Day', $year)[0];
    }
}
