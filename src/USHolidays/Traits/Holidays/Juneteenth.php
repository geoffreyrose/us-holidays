<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait Juneteenth
{
    /**
     * Setting Juneteenth
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setJuneteenth(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 6, 19, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Juneteenth for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getJuneteenthHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Juneteenth', $year)[0];
    }
}
