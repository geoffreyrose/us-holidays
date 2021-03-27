<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Juneteenth
{
    /**
     * Setting Juneteenth
     *
     * @param int $year The year to get the holiday in
     */
    private function setJuneteenth($year)
    {
        return Carbon::create($year, 6, 19, 0, 0, 0);
    }

    /**
     * Return object of Juneteenth for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getJuneteenthHoliday($year = null)
    {
        return $this->getHolidaysByYear("Juneteenth", $year)[0];
    }
}
