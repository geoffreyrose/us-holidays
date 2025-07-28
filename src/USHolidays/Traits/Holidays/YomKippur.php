<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait YomKippur
{
    /**
     * Setting Yom Kippur
     *
     * @param int $year The year to get the holiday in
     */
    private function setYomKippur(int $year)
    {
        return USHolidays::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 10, 3761 + $year)))->setTime(0, 0, 0);
    }

    /**
     * Return object of Yom Kippur for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getYomKippurHoliday(?int $year = null)
    {
        return $this->getHolidaysByYear('Yom Kippur', $year)[0];
    }
}
