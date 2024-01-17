<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\Carbon;

trait Kwanzaa
{
    /**
     * Setting Kwanzaa
     *
     * @param int $year The year to get the holiday in
     */
    private function setKwanzaa(int $year)
    {
        return Carbon::create($year, 12, 26, 0, 0, 0);
    }

    /**
     * Return object of Kwanzaa for given year
     *
     * @param int|null $year The year to get the holiday in
     */
    public function getKwanzaaHoliday(int $year = null)
    {
        return $this->getHolidaysByYear('Kwanzaa', $year)[0];
    }
}
