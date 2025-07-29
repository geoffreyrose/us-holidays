<?php

namespace USHolidays\Traits\Holidays;

trait PalmSunday
{
    /**
     * Setting Palm Sunday
     *
     * @param int $year The year to get the holiday in
     */
    private function setPalmSunDay(int $year)
    {
        return $this->setEaster($year)->subWeeks(1);
    }

    /**
     * Return object of Palm Sunday for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getPalmSundayHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Palm Sunday', $year)[0];
    }
}
