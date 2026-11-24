<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait YomKippur
{
    /**
     * Setting Yom Kippur
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setYomKippur(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::createFromFormat('m/d/Y', jdtogregorian(jewishtojd(1, 10, 3761 + $year)));
        $date->setTime(0, 0, 0);
        return $date;
    }

    /**
     * Return object of Yom Kippur for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getYomKippurHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Yom Kippur', $year)[0];
    }
}
