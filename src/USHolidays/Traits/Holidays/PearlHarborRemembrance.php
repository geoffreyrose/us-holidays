<?php

namespace USHolidays\Traits\Holidays;

use USHolidays\USHolidays;

trait PearlHarborRemembrance
{
    /**
     * Setting Pearl Harbor Remembrance
     *
     * @param  int  $year  The year to get the holiday in
     *
     * @return USHolidays
     */
    private function setPearlHarborRemembrance(int $year): USHolidays
    {
        /** @var USHolidays $date */
        $date = USHolidays::create($year, 12, 7, 0, 0, 0);
        return $date;
    }

    /**
     * Return object of Pearl Harbor Remembrance Day for given year
     *
     * @param  int|null  $year  The year to get the holiday in
     *
     * @return object
     */
    public function getPearlHarborRemembranceDayHoliday(?int $year = null): object
    {
        return $this->getHolidaysByYear('Pearl Harbor Remembrance Day', $year)[0];
    }
}
