<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Kwanzaa
{
    /**
     * Setting Kwanzaa
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setKwanzaa(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 12, 26, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Kwanzaa for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getKwanzaaHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Kwanzaa', $year)[0];
    }
}
